@extends('layouts.web')

@section('page-title', 'Products')

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
                <div class="col-lg-6">
                    <h1 class="hero__title">Lorem ipsum dolor sit amet</h1>
                    <p class="hero__description">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                </div>
            </div>
        </div>
    </section>
    <!-- END HERO -->

    <!-- FEATURE SECTION -->
    <section class="bg-2 py-10 py-md-11 text-center">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <svg class="mh-9" xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" viewBox="0 0 24 24" fill="currentColor"><g><rect fill="none" height="24" width="24"/></g><g><g><rect height="5" opacity=".3" width="5" x="11" y="11"/><rect height="5" opacity=".3" width="5" x="4" y="11"/><rect height="5" opacity=".3" width="12" x="4" y="4"/><path d="M20,6v14H6v2h14c1.1,0,2-0.9,2-2V6H20z"/><path d="M18,16V4c0-1.1-0.9-2-2-2H4C2.9,2,2,2.9,2,4v12c0,1.1,0.9,2,2,2h12C17.1,18,18,17.1,18,16z M4,4h12v5H4V4z M9,16H4v-5h5 V16z M11,11h5v5h-5V11z"/></g></g></svg>
                    <h2 class="h4">Lorem ipsum</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                </div>
                <div class="col-md-4">
                    <svg class="mh-9" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" >
                        <path d="M0 0h24v24H0V0z" fill="none"/><path d="M19.21 12.04l-1.53-.11-.3-1.5C16.88 7.86 14.62 6 12 6 9.94 6 8.08 7.14 7.12 8.96l-.5.95-1.07.11C3.53 10.24 2 11.95 2 14c0 2.21 1.79 4 4 4h13c1.65 0 3-1.35 3-3 0-1.55-1.22-2.86-2.79-2.96z" opacity=".3"/><path d="M19.35 10.04C18.67 6.59 15.64 4 12 4 9.11 4 6.6 5.64 5.35 8.04 2.34 8.36 0 10.91 0 14c0 3.31 2.69 6 6 6h13c2.76 0 5-2.24 5-5 0-2.64-2.05-4.78-4.65-4.96zM19 18H6c-2.21 0-4-1.79-4-4 0-2.05 1.53-3.76 3.56-3.97l1.07-.11.5-.95C8.08 7.14 9.94 6 12 6c2.62 0 4.88 1.86 5.39 4.43l.3 1.5 1.53.11c1.56.1 2.78 1.41 2.78 2.96 0 1.65-1.35 3-3 3z"/>
                    </svg>
                    <h2 class="h4">Lorem ipsum</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                </div>
                <div class="col-md-4">
                    <svg class="mh-9" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M0 0h24v24H0V0z" fill="none"/><path d="M18 10h4v7h-4z" opacity=".3"/><path d="M23 8h-6c-.55 0-1 .45-1 1v10c0 .55.45 1 1 1h6c.55 0 1-.45 1-1V9c0-.55-.45-1-1-1zm-1 9h-4v-7h4v7zM4 6h18V4H4c-1.1 0-2 .9-2 2v11H0v3h14v-3H4V6z"/>
                    </svg>
                    <h2 class="h4">Lorem ipsum</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                </div>
            </div>
        </div>
    </section>
    <!-- END FEATURE SECTION -->

    <!-- PRODUCT SECTION -->
    <section class="py-10 py-md-11">
        <div class="container">

            <div class="row">
                <div class="col-3 d-none d-lg-block">
                    <nav class="nav flex-column sticky" data-scrollspy>
                        <a class="nav-link border-left-2" href="#categoryOne">Category One</a>
                        <a class="nav-link border-left-2" href="#categoryTwo">Category Two</a>
                        <a class="nav-link border-left-2" href="#categoryThree">Category Three</a>
                    </nav>
                </div>
                <div class="col-lg-9">
                    <div class="row mb-10">
                        <div class="col-12">
                            <h2 id="categoryOne">Category One</h2>
                            <p class="font-size-4 mb-8">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                        </div>
                        <div class="col-lg-4">
                            <div class="card border hover-scale h-100">
                                <div class="card-body p-7">
                                    <img class="mh-8 mb-8" src="INSERT_PRODUCT_LOGO" alt="Logo">
                                    <h3 class="card-title h5">Product One</h3>
                                    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                    <a class="stretched-link" href="{{ route('product.show', 'product_one') }}"></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-10">
                        <div class="col-12">
                            <h2 id="categoryTwo">Category Two</h2>
                            <p class="font-size-4 mb-8">Lorem ipsum dolor sit amet, consectetur.</p>
                        </div>
                        <div class="col-lg-4">
                            <div class="card border hover-scale h-100">
                                <div class="card-body p-7">
                                    <img class="mh-8 mb-8" src="INSERT_PRODUCT_LOGO" alt="Logo">
                                    <h3 class="card-title h5">Product Two</h3>
                                    <p class="card-text">Lorem ipsum dolor sit amet.</p>
                                    <a class="stretched-link" href="{{ route('product.show', 'product_two') }}"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-12">
                            <h2 id="categoryThree">Category Three</h2>
                            <p class="font-size-4 mb-8">Lorem ipsum dolor sit amet, consectetur.</p>
                        </div>
                        <div class="col-lg-4">
                            <div class="card border hover-scale h-100">
                                <div class="card-body p-7">
                                    <img class="mh-8 mb-8" src="INSERT_PRODUCT_LOGO" alt="Logo">
                                    <h3 class="card-title h5">Product Three</h3>
                                    <p class="card-text">Lorem ipsum dolor sit amet.</p>
                                    <a class="stretched-link" href="{{ route('product.show', 'product_three') }}"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END PRODUCT SECTION -->
@endsection
