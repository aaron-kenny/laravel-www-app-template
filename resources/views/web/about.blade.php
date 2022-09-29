@extends('layouts.web')

@section('page-title', 'About Us')

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
                <div class="col-sm-7">
                    <h1 class="hero__title">About Us</h1>
                    <p class="hero__description">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                </div>
            </div>
        </div>
    </section>
    <!-- END HERO -->

    <!-- ABOUT SECTION -->
    <section class="bg-1 py-10 text-center">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2>AppName <small>[/ˈapp.naːme/]</small></h2>
                    <p>Lorem ipsum dolor sit amet.</p>
                </div>
            </div>
        </div>
    </section>
    <!-- END ABOUT SECTION -->

    <!-- VALUES SECTION -->
    <section class="bg-2 py-10 text-center">
        <div class="container">
            <h2>Our Values</h2>
            <p class="mb-9 font-size-5">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
            <div class="row justify-content-center text-left">
                <div class="col-md-5 col-lg-3 mb-6">
                    <div class="nav nav-bordered-left flex-column">
                        <a class="nav-link active" data-toggle="tab" href="#valueOne">Value One</a>
                        <a class="nav-link" data-toggle="tab" href="#valueTwo">Value Two</a>
                        <a class="nav-link" data-toggle="tab" href="#valueThree">Value Three</a>
                    </div>
                </div>
                <div class="col-md-7 col-lg-6">
                    <div class="nav-content">
                        <div id="valueOne" class="nav-pane fade show active">
                            <p class="font-size-6">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                        </div>
                        <div id="valueTwo" class="nav-pane fade">
                            <p class="font-size-6">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                        </div>
                        <div id="valueThree" class="nav-pane fade">
                            <p class="font-size-6">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END VALUES SECTION -->
@endsection
