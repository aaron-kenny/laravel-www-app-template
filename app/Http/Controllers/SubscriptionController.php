<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Cashier\Exceptions\IncompletePayment;
use Illuminate\Support\Facades\Notification;
use App\Notifications\UserSubscribed;

class SubscriptionController extends Controller
{
    public function index()
    {
        // TODO
        // OPTIMIZE GETTING CURRENT PERIOD END. CAHSIER OR STRIPE SUBSCRIPTIONS?
        $subscriptions = request()->user()->subscriptions->sortByDesc(function ($value) {
            return $value->created_at->getTimestamp();
        })->filter(function($subscription, $key) {
            return $subscription->valid();
        })->map(function($subscription, $key) {
            $subscription->stripe_plan = \Stripe\Plan::retrieve($subscription->stripe_plan, request()->user()->stripeOptions());
            $stripeSubscription = \Stripe\Subscription::retrieve($subscription->stripe_id, request()->user()->stripeOptions());
            $subscription->current_period_end = $stripeSubscription->current_period_end;
            return $subscription;
        });

        return view('subscriptions.index', compact('subscriptions'));
    }

    public function show($subscriptionId)
    {
        $subscription = request()->user()->subscriptions->find($subscriptionId);
        $subscription->stripe_plan = \Stripe\Plan::retrieve($subscription->stripe_plan, request()->user()->stripeOptions());
        $stripeSubscription = \Stripe\Subscription::retrieve($subscription->stripe_id, request()->user()->stripeOptions());
        $subscription->current_period_end = $stripeSubscription->current_period_end;

        $plans = [];
        $stripePlans = \Stripe\Plan::all(['product' => $subscription->stripe_plan->product], request()->user()->stripeOptions());
        foreach($stripePlans->data as $stripePlan) {
            if($stripePlan->id != $subscription->stripe_plan->id) $plans[] = $stripePlan;
        }

        $invoices = request()->user()->invoices(false, ['subscription' => $subscription->stripe_id]);

        return view('subscriptions.show', compact(
            'subscription',
            'plans',
            'invoices',
        ));
    }

    public function cancel($subscriptionId)
    {
        $subscription = request()->user()->subscriptions->find($subscriptionId);
        $subscription->stripe_plan = \Stripe\Plan::retrieve($subscription->stripe_plan, request()->user()->stripeOptions());
        $stripeSubscription = \Stripe\Subscription::retrieve($subscription->stripe_id, request()->user()->stripeOptions());
        $subscription->current_period_end = $stripeSubscription->current_period_end;

        return view('subscriptions.cancel', compact(
            'subscription',
        ));
    }
    
    public function renew($subscriptionId)
    {
        $subscription = request()->user()->subscriptions->find($subscriptionId);
        $subscription->stripe_plan = \Stripe\Plan::retrieve($subscription->stripe_plan, request()->user()->stripeOptions());
        $stripeSubscription = \Stripe\Subscription::retrieve($subscription->stripe_id, request()->user()->stripeOptions());
        $subscription->current_period_end = $stripeSubscription->current_period_end;

        return view('subscriptions.renew', compact(
            'subscription',
        ));
    }
    
    public function preview($subscriptionId, $planId)
    {
        $stripe = new \Stripe\StripeClient(
            'INSERT_STRIPE_SECRET_TEST_KEY'
        );

        $subscription = request()->user()->subscriptions->find($subscriptionId);
        $subscription->stripe_plan = \Stripe\Plan::retrieve($subscription->stripe_plan, request()->user()->stripeOptions());
        $stripeSubscription = \Stripe\Subscription::retrieve($subscription->stripe_id, request()->user()->stripeOptions());
        $subscription->current_period_end = $stripeSubscription->current_period_end;

        return view('subscriptions.preview', compact(
            'subscription',
        ));
    }
    
    public function change($subscriptionId)
    {
        $subscription = request()->user()->subscriptions->find($subscriptionId);
        $subscription->stripe_plan = \Stripe\Plan::retrieve($subscription->stripe_plan, request()->user()->stripeOptions());
        $stripeSubscription = \Stripe\Subscription::retrieve($subscription->stripe_id, request()->user()->stripeOptions());
        $subscription->current_period_end = $stripeSubscription->current_period_end;

        $plans = [];
        $stripePlans = \Stripe\Plan::all(['product' => $subscription->stripe_plan->product], request()->user()->stripeOptions());
        foreach($stripePlans->data as $stripePlan) {
            if($stripePlan->id != $subscription->stripe_plan->id) $plans[] = $stripePlan;
        }

        $invoices = request()->user()->invoices(false, ['subscription' => $subscription->stripe_id]);
        $defaultPaymentMethod = request()->user()->defaultPaymentMethod();

        return view('subscriptions.change', compact(
            'subscription',
            'plans',
            'invoices',
            'defaultPaymentMethod'
        ));
    }

    public function create()
    {
        $subscriptionName = request('subscription_name');
        // REDIRECT IF ALREADY HAS ACTIVE SUBSCRIPTION
        if(request()->user()->subscribed($subscriptionName)) {
            return redirect()->route('subscriptions.index')->with('status', 'You are already subscribed to ' . ucfirst($subscriptionName) . '.');
        }
        $planId = request('plan_id');
        $setupIntent = request()->user()->createSetupIntent();
        $hasDefaultPaymentMethod = request()->user()->hasDefaultPaymentMethod();
        $cardBrand = ucfirst(request()->user()->card_brand);
        $cardLastFour = request()->user()->card_last_four;
        $trialDays = config('product.' . $subscriptionName . '.trial_days');
        $plan = \Stripe\Plan::retrieve(['id' => $planId], request()->user()->stripeOptions());

        // CHECK IF EVER PREVIOUSLY SUBSCRIBED
        $previouslySubscribed = request()->user()->subscriptions->filter(function($subscription, $key) use($subscriptionName) {
            return $subscription->name == $subscriptionName && $subscription->ended();
        })->isNotEmpty();

        return view('subscriptions.create', compact(
            'subscriptionName',
            'setupIntent',
            'hasDefaultPaymentMethod',
            'cardBrand',
            'cardLastFour',
            'plan',
            'trialDays',
            'previouslySubscribed',
        ));
    }

    public function store()
    {
        $subscriptionName = request('subscription_name');
        $planId = request('plan_id');
        $paymentMethod = request('payment_method');
        $freeTrial = request()->filled('free_trial');
        $productUrl = config('product.' . $subscriptionName . '.url');

        // Confirm whether user was previously subscribed
        $previouslySubscribed = request()->user()->subscriptions->filter(function($subscription, $key) use ($subscriptionName) {
            return $subscription->name == $subscriptionName && $subscription->ended();
        })->isNotEmpty();

        $previouslySubscribed ? $trialDays = 0 : $trialDays = config('product.' . $subscriptionName . '.trial_days');

        // If user is attempting free trial but they have
        // already been subscribed, redirect them instead
        // of charging them
        if($freeTrial && $previouslySubscribed) {
            return back()->with('status', 'You are not eligible for another free trial. You have already been subscribed in the past.');
        }

        // SUBSCRIBE THE CUSTOMER
        if(request()->user()->hasDefaultPaymentMethod()) {
            // User is Stripe customer and has default payment method
            request()->user()->newSubscription($subscriptionName, $planId)->trialDays($trialDays)->create(request()->user()->defaultPaymentMethod()->id);
        } elseif(request()->user()->hasStripeId() && ! $paymentMethod) {
            // User is a stripe customer without default payment method and did not enter method
            return redirect()->route('account.billing.index')->with('status', 'You do not have any payment methods on file. Please add one and try subscribing again.');
        } else {
            // User is not a Stripe customer and has entered a new credit card
            request()->user()->newSubscription($subscriptionName, $planId)->trialDays($trialDays)->create($paymentMethod, [
                'name' => request()->user()->full_name,
                'email' => request()->user()->email,
            ]);
        }

        Notification::route('mail', 'INSERT_NOTIFICATION_EMAIL_ADDRESS')->notify(new UserSubscribed([
            'subscriptionName' => ucfirst($subscriptionName),
            'firstName' => request()->user()->first_name,
            'lastName' => request()->user()->last_name,
        ]));

        // Redirect to product URL, or back to dashboard
        if($productUrl) {
            return redirect($productUrl)->with('status', 'Your subscription to ' . ucfirst($subscriptionName) . ' was completed successfully!');
        } else {
            return redirect()->route('account.dashboard.index')->with('status', 'Your subscription to ' . ucfirst($subscriptionName) . ' was completed successfully!');
        }
    }

    public function update($subscriptionId)
    {
        $subscriptionName = request('subscription_name');
        $planId = request('plan_id');
        $updateAction = request('update_action');

        if($updateAction == 'renew') {
            request()->user()->subscription($subscriptionName)->resume();
            return redirect()->route('subscriptions.index')->with('status', 'Your subscription to ' . ucfirst($subscriptionName) . ' was resumed successfully!');
        } elseif($updateAction == 'change_plan') {
            request()->user()->subscription($subscriptionName)->swap($planId);
            return redirect()->route('subscriptions.index')->with('status', 'You subscription plan was changed successfully!');
        }
    }

    public function destroy($subscriptionId)
    {
        $subscriptionName = request('subscription_name');
        // $cancelAction = request('cancel_action');

        // if($cancelAction == 'cancel_now') {
        //     $subscription = request()->user()->subscription($subscriptionName);
        //     $subscription->trial_ends_at = now();
        //     $subscription->cancelNow();

        //     return redirect()->route('subscriptions.index')->with('status', 'Your subscription to ' . ucfirst($subscriptionName) . ' was canceled immediately and you no longer have access.');
        // } elseif($cancelAction == 'cancel') {
        //     request()->user()->subscription($subscriptionName)->cancel();
        //     return redirect()->route('subscriptions.index')->with('status', 'Your subscription to ' . ucfirst($subscriptionName) . ' was canceled successfully! You will not be charged again.');
        // }


        request()->user()->subscription($subscriptionName)->cancel();
        return redirect()->route('subscriptions.index')->with('status', 'Your subscription to ' . ucfirst($subscriptionName) . ' was canceled successfully! You will not be charged again.');

    }
}