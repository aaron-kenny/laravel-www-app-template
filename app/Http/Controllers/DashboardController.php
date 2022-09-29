<?php

namespace App\Http\Controllers;

class DashboardController extends Controller
{
    public function __construct()
    {
        //
    }

    public function index()
    {
        // if(request()->user()->hasStripeId()) {
        //     $customer_subscriptions = \Stripe\Subscription::all([
        //         'customer' => $stripe_id,
        //         'limit' => 50,
        //         'expand' => ['data.plan.product'],
        //     ]);
        // } else {
        //     $customer_subscriptions = null;
        // }

        // $subscriptions = request()->user()->subscriptions;
        // dd($subscriptions);

        $subscriptions = request()->user()->subscriptions->sortByDesc(function ($value) {
            return $value->created_at->getTimestamp();
        })->filter(function($subscription, $key) {
            return $subscription->valid();
        });

        // $products = \Stripe\Product::all(['active' => true, 'limit' => 100], request()->user()->stripeOptions());

        return view('account.dashboard.index', compact('subscriptions'));
    }
}