<?php

namespace App\Http\Controllers;

class BillingController extends Controller
{
    public function __construct()
    {
        //
    }
    
    public function index()
    {
        $has_payment_method = request()->user()->hasPaymentMethod();
        $default_payment_method = request()->user()->defaultPaymentMethod();
        $payment_methods = request()->user()->paymentMethods();
        $invoices = request()->user()->invoices();

        $has_valid_subscriptions = request()->user()->subscriptions->filter(function($subscription, $key) {
            return $subscription->valid();
            // TODO
            // DONT INCLUDE FREE SUBSCRIPTIONS
        })->isNotEmpty();

        return view('account.billing.index', compact(
            'has_payment_method',
            'default_payment_method',
            'payment_methods',
            'invoices',
            'has_valid_subscriptions'
        ));
    }
    
    public function create()
    {
        $setup_intent = request()->user()->createSetupIntent();

        return view('account.billing.create', compact('setup_intent'));
    }
    
    public function edit($payment_method_id)
    {
        $payment_method = request()->user()->findPaymentMethod($payment_method_id);

        return view('account.billing.edit', compact('payment_method'));
    }
    
    public function store()
    {
        $payment_method = request('payment_method');

        if(!request()->user()->hasStripeId()) {
            request()->user()->createAsStripeCustomer([
                'name' => request()->user()->full_name,
            ]);
            request()->user()->updateDefaultPaymentMethod($payment_method);
        } elseif(!request()->user()->hasPaymentMethod()) {
            request()->user()->updateDefaultPaymentMethod($payment_method);
        } else {
            request()->user()->addPaymentMethod($payment_method);
        }

        return redirect()->route('account.billing.index')->with('status', 'Payment method was successfully added!');
    }
    
    public function update($payment_method_id)
    {
        try {
            if(request()->input('update_action') == 'make_default') {
                request()->user()->updateDefaultPaymentMethod($payment_method_id);
                return back()->with('status', 'Payment method successfully marked as default!');
            } elseif(request()->input('update_action') == 'update_card') {
                $current_year = date('Y');

                request()->validate([
                    'exp_month' => 'required|numeric|min:1|max:12',
                    'exp_year' => "required|numeric|min:{$current_year}",
                ]);

                \Stripe\PaymentMethod::update($payment_method_id, ['card' => ['exp_month' => request()->input('exp_month'),'exp_year' => request()->input('exp_year')]], request()->user()->stripeOptions());
                
                return redirect()->route('account.billing.index')->with('status', 'Payment method expiration successfully updated!');
            }
        } catch(Throwable $e) {
            return back()->withError($e->getMessage());
        }
    }
    
    public function destroy($payment_method_id)
    {
        $payment_method = request()->user()->findPaymentMethod($payment_method_id);

        // TODO
        // IF PAYMENT METHOD IS DEFAULT METHOD, MAKE SURE NO VALID SUBSCRIPTIONS

        try {
            $payment_method->delete();
            return back()->with('status', 'Payment method successfully deleted!');
        } catch(Throwable $e) {
            return back()->withError($e->getMessage());
        }
    }
}