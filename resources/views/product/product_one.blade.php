@extends('layouts.web')

@section('page-title', 'Product One')

@push('meta')
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ request()->url() }}">
    <meta property="og:title" content="INSERT_TITLE">
    <meta property="og:description" content="INSERT_DESCRIPTION">
    <meta property="og:image" content="INSERT_PATH_TO_TWITTER_CARD_IMAGE">
    <meta property="fb:app_id" content="INSERT_FACEBOOK_APP_ID">

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="INSERT_TITLE">
    <meta name="twitter:description" content="INSERT_DESCRIPTION">
    <meta name="twitter:image" content="INSERT_PATH_TO_TWITTER_CARD_IMAGE">
@endpush

@section('content')
    <!-- HERO -->
    <section class="hero">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="hero__product-name">
                        <img src="INSERT_PRODUCT_LOGO" alt="Logo" />
                        <p>Product One</p>
                    </div>
                    <h1 class="hero__title">Lorem ipsum<br>dolor sit amet</h1>
                    <p class="hero__description">Lorem ipsum dolor sit amet, consectetur adipiscing elit.   </p>
                    @if($subscribed)
                        <a class="btn btn-primary btn-dark-bg" href="{{ config('product.product_one.url') }}">Launch Product One</a>
                    @elseif($previously_subscribed)
                        <a class="btn btn-primary btn-dark-bg" href="#pricing">Get started</a>
                    @else
                        <a class="btn btn-primary btn-dark-bg" href="#pricing">Start your free trial</a>
                    @endif
                    <a class="btn btn-primary-outline btn-dark-bg" href="{{ route('documentation.show', 'product_one') }}">View documentation</a>
                </div>
            </div>
        </div>
    </section>
    <!-- END HERO -->

    <!-- FEATURE SECTION -->
    <section class="bg-1 py-12 text-center">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <svg class="mh-9" viewBox="0 0 24 24">
                        <path fill="currentColor" d="M12,17A2,2 0 0,0 14,15C14,13.89 13.1,13 12,13A2,2 0 0,0 10,15A2,2 0 0,0 12,17M18,8A2,2 0 0,1 20,10V20A2,2 0 0,1 18,22H6A2,2 0 0,1 4,20V10C4,8.89 4.9,8 6,8H7V6A5,5 0 0,1 12,1A5,5 0 0,1 17,6V8H18M12,3A3,3 0 0,0 9,6V8H15V6A3,3 0 0,0 12,3Z" />
                    </svg>
                    <h2 class="h4">Feature One</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                </div>
                <div class="col-md-4">
                    <svg class="mh-9" viewBox="0 0 24 24">
                        <path fill="currentColor" d="M18.41,4L16,6.41V6.59L18.41,9H22V11H17.59L16,9.41V12H15A2,2 0 0,1 13,10V7.5H9.86C9.77,7.87 9.62,8.22 9.42,8.55L15.18,19H20A2,2 0 0,1 22,21V22H2V21A2,2 0 0,1 4,19H10.61L5.92,10.5C4.12,10.47 2.56,9.24 2.11,7.5C1.56,5.36 2.85,3.18 5,2.63C7.13,2.08 9.31,3.36 9.86,5.5H13V3A2,2 0 0,1 15,1H16V3.59L17.59,2H22V4H18.41M6,4.5A2,2 0 0,0 4,6.5A2,2 0 0,0 6,8.5A2,2 0 0,0 8,6.5A2,2 0 0,0 6,4.5Z" />
                    </svg>
                    <h2 class="h4">Feature Two</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.</p>
                </div>
                <div class="col-md-4">
                    <svg class="mh-9" viewBox="0 0 24 24">
                        <path fill="currentColor" d="M4,1H20A1,1 0 0,1 21,2V6A1,1 0 0,1 20,7H4A1,1 0 0,1 3,6V2A1,1 0 0,1 4,1M4,9H20A1,1 0 0,1 21,10V14A1,1 0 0,1 20,15H4A1,1 0 0,1 3,14V10A1,1 0 0,1 4,9M4,17H20A1,1 0 0,1 21,18V22A1,1 0 0,1 20,23H4A1,1 0 0,1 3,22V18A1,1 0 0,1 4,17M9,5H10V3H9V5M9,13H10V11H9V13M9,21H10V19H9V21M5,3V5H7V3H5M5,11V13H7V11H5M5,19V21H7V19H5Z" />
                    </svg>
                    <h2 class="h4">Feature Three</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
                </div>
            </div>
        </div>
    </section>
    <!-- END FEATURE SECTION -->

    <!-- HOW IT WORKS SECTION -->
    <section class="bg-2 py-12 text-center">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <h2 class="mb-5">How it works</h2>
                    <img class="img-fluid" src="INSERT_PATH_TO_FEATURE_IMAGE" alt="How it works">
                </div>
            </div>
        </div>
    </section>
    <!-- END HOW IT WORKS SECTION -->

    <!-- CODE SECTION -->
    <section class="bg-1 py-12">
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <div class="col-lg-7">
                    <h2>Lorem ipsum dolor</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                </div>
                <div class="col-lg-5">
                    <pre>
    {
        "apiToken": "74acf539-44aa-4a658H59effd",
        "broker": "testBroker",
        "oandaApiToken": "16276174-91ef-c9ce950b1324",
        "oandaAccount": "126-057-6871609-256",
        "action": "placeOrder",
        "order": {
            "type": "MARKET",
            "instrument": "GBP_USD",
            "units": "-1000",
            "timeInForce": "FOK",
            "positionFill": "DEFAULT"
        }
    }</pre>
                </div>
            </div>
        </div>
    </section>
    <!-- END CODE SECTION -->

    @if($subscribed)
        <!-- LAUNCH PRODUCT ONE SECTION -->
        <section class="bg-2 py-12">
            <div class="container text-center">
                <h2 class="mb-3">Ready to automate your strategy?</h2>
                <a class="btn btn-primary" href="{{ config('product.product_one.url') }}">Launch Product One</a>
            </div>
        </section>
        <!-- END LAUNCH PRODUCT ONE SECTION -->
    @else
        <!-- PRICING SECTION -->
        <section id="pricing" class="bg-2 py-12">
            <div class="container">
                <div class="row justify-content-center text-center">
                    <div class="col-lg-10">
                        <h2 class="mb-5">Hosted plans</h2>
                    </div>
                </div>
                <div class="row justify-content-center align-items-end">
                    <div class="col-md-5 col-xl-3">

                        <div class="card">
                            <div class="card-body">
                                <h2 class="card-title h4">Product One Monthly</h2>
                                <p class="h5 mb-0">$10<span class="small text-muted">/month</span></p>
                                <p class="small text-muted">$10 billed monthly</p>
                                <p><svg class="fill-1 mh-3 mw-3 mb-1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" viewBox="0 0 24 24"><path d="M21,7L9,19L3.5,13.5L4.91,12.09L9,16.17L19.59,5.59L21,7Z" /></svg> Feature</p>
                                <p><svg class="fill-1 mh-3 mw-3 mb-1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" viewBox="0 0 24 24"><path d="M21,7L9,19L3.5,13.5L4.91,12.09L9,16.17L19.59,5.59L21,7Z" /></svg> Feature</p>
                                <p><svg class="fill-1 mh-3 mw-3 mb-1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" viewBox="0 0 24 24"><path d="M21,7L9,19L3.5,13.5L4.91,12.09L9,16.17L19.59,5.59L21,7Z" /></svg> Feature</p>
                                <p><svg class="fill-1 mh-3 mw-3 mb-1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" viewBox="0 0 24 24"><path d="M21,7L9,19L3.5,13.5L4.91,12.09L9,16.17L19.59,5.59L21,7Z" /></svg> Feature</p>
                                <p><svg class="fill-1 mh-3 mw-3 mb-1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" viewBox="0 0 24 24"><path d="M21,7L9,19L3.5,13.5L4.91,12.09L9,16.17L19.59,5.59L21,7Z" /></svg> Feature</p>
                                <p><svg class="fill-1 mh-3 mw-3 mb-1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" viewBox="0 0 24 24"><path d="M21,7L9,19L3.5,13.5L4.91,12.09L9,16.17L19.59,5.59L21,7Z" /></svg> Feature</p>
                                <p><svg class="fill-1 mh-3 mw-3 mb-1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" viewBox="0 0 24 24"><path d="M21,7L9,19L3.5,13.5L4.91,12.09L9,16.17L19.59,5.59L21,7Z" /></svg> Feature</p>

                                @if($previously_subscribed)
                                    <a class="btn btn-primary-outline btn-block" href="{{ route('subscriptions.create', ['subscription_name' => 'product_one', 'plan_id' => config('product.product_one.plan.monthly')]) }}">Get started</a>
                                @else
                                    <a class="btn btn-primary-outline btn-block" href="{{ route('subscriptions.create', ['subscription_name' => 'product_one', 'plan_id' => config('product.product_one.plan.monthly')]) }}">Start {{ config('product.product_one.trial_days') }} day free trial</a>
                                @endif
                            </div>
                        </div>

                    </div>
                    <div class="col-md-5 col-xl-3">

                        <div class="card card-highlight">
                            <div class="card-header text-center">
                                <h2 class="card-title h5 my-3">MOST POPULAR</h2>
                            </div>
                            <div class="card-body">
                                <h2 class="card-title h4">Product One Yearly</h2>
                                <p class="h5 mb-0">$8<span class="small text-muted">/month</span></p>
                                <p class="small text-muted">$96 billed annually</p>
                                <p><svg class="fill-1 mh-3 mw-3 mb-1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" viewBox="0 0 24 24"><path d="M21,7L9,19L3.5,13.5L4.91,12.09L9,16.17L19.59,5.59L21,7Z" /></svg> Feature</p>
                                <p><svg class="fill-1 mh-3 mw-3 mb-1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" viewBox="0 0 24 24"><path d="M21,7L9,19L3.5,13.5L4.91,12.09L9,16.17L19.59,5.59L21,7Z" /></svg> Feature</p>
                                <p><svg class="fill-1 mh-3 mw-3 mb-1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" viewBox="0 0 24 24"><path d="M21,7L9,19L3.5,13.5L4.91,12.09L9,16.17L19.59,5.59L21,7Z" /></svg> Feature</p>
                                <p><svg class="fill-1 mh-3 mw-3 mb-1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" viewBox="0 0 24 24"><path d="M21,7L9,19L3.5,13.5L4.91,12.09L9,16.17L19.59,5.59L21,7Z" /></svg> Feature</p>
                                <p><svg class="fill-1 mh-3 mw-3 mb-1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" viewBox="0 0 24 24"><path d="M21,7L9,19L3.5,13.5L4.91,12.09L9,16.17L19.59,5.59L21,7Z" /></svg> Feature</p>
                                <p><svg class="fill-1 mh-3 mw-3 mb-1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" viewBox="0 0 24 24"><path d="M21,7L9,19L3.5,13.5L4.91,12.09L9,16.17L19.59,5.59L21,7Z" /></svg> Feature</p>
                                <p><svg class="fill-1 mh-3 mw-3 mb-1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" viewBox="0 0 24 24"><path d="M21,7L9,19L3.5,13.5L4.91,12.09L9,16.17L19.59,5.59L21,7Z" /></svg> Feature</p>

                                @if($previously_subscribed)
                                    <a class="btn btn-primary btn-block" href="{{ route('subscriptions.create', ['subscription_name' => 'product_one', 'plan_id' => config('product.product_one.plan.yearly')]) }}">Get started</a>
                                @else
                                    <a class="btn btn-primary btn-block" href="{{ route('subscriptions.create', ['subscription_name' => 'product_one', 'plan_id' => config('product.product_one.plan.yearly')]) }}">Start {{ config('product.product_one.trial_days') }} day free trial</a>
                                @endif
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>
        <!-- END PRICING SECTION -->
    @endif

@endsection
