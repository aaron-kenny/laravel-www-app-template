<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct()
    {
        //
    }

    public function index()
    {
        return view('product.index');
    }

    public function show($product_name)
    {
        $subscribed = false;
        $previously_subscribed = false;

        if(request()->user()) {
            // CHECK IF SUBSCRIBED
            $subscribed = request()->user()->subscribed($product_name);
            // CHECK IF EVER PREVIOUSLY SUBSCRIBED
            $previously_subscribed = request()->user()->subscriptions->sortByDesc(function ($value) {
                return $value->created_at->getTimestamp();
            })->filter(function($subscription, $key) use($product_name) {
                return $subscription->name == $product_name && $subscription->cancelled();
            })->isNotEmpty();
        }

        return view("product.{$product_name}", compact('subscribed', 'previously_subscribed'));
    }
}