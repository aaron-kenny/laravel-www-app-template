<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Product information
    |--------------------------------------------------------------------------
    */

    'product_one' => [
        'url' => env('PRODUCT_ONE_URL', 'https://product-one.laravelwebsite.com'),
        'trial_days' => env('PRODUCT_ONE_TRIAL_DAYS', 30),
        'plan' => [
            'monthly' => env('PRODUCT_ONE_PLAN_MONTHLY'),
            'yearly' => env('PRODUCT_ONE_PLAN_YEARLY'),
        ]
    ],

];
