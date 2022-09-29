@extends('layouts.web')

@section('page-title', 'Product Two')

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
                    <div class="hero__product-name">
                        <img src="INSERT_PRODUCT_LOGO" alt="Logo" />
                        <p>Product Two <span class="badge">pre-release</span></p>
                    </div>
                    <h1 class="hero__title">Lorem ipsum dolor</h1>
                    <p class="hero__description">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.</p>
                </div>
                <div class="col-lg-4">
                    <div class="hero__card">
                        <div class="hero__card-header">
                            <h2 class="hero__card-title">Get the latest updates</h2>
                        </div>
                        <div class="hero__card-body">
                            <form action="{{ route('marketing-email.store') }}" method="POST">
                                @csrf
                                <div class="mb-4">
                                    <input class="form-control @error('email') is-invalid @enderror" type="email" name="email" placeholder="Email address" required value="{{ old('email') }}" autocomplete="email">
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-4">
                                    <button class="btn btn-primary w-100">Keep Me Updated</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <p class="hero__footnote">You can unsubscribe at any time and we never sell your information. You can read our privacy policy <a href="{{ route('legal.privacy') }}">here</a>.</p>
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
                    <svg class="mh-9 mb-4" viewBox="0 0 24 24">
                        <path fill="currentColor" d="M9,20.42L2.79,14.21L5.62,11.38L9,14.77L18.88,4.88L21.71,7.71L9,20.42Z" />
                    </svg>
                    <h2 class="h4">Feature One</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                </div>
                <div class="col-md-4">
                    <svg class="mh-9 mb-4" viewBox="0 0 24 24">
                        <path fill="currentColor" d="M3,4H7V8H3V4M9,5V7H21V5H9M3,10H7V14H3V10M9,11V13H21V11H9M3,16H7V20H3V16M9,17V19H21V17H9" />
                    </svg>
                    <h2 class="h4">Feature Two</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>
                </div>
                <div class="col-md-4">
                    <svg class="mh-9 mb-4" viewBox="0 0 24 24">
                        <path fill="currentColor" d="M12,2A10,10 0 0,0 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12A10,10 0 0,0 12,2M16.2,16.2L11,13V7H12.5V12.2L17,14.9L16.2,16.2Z" />
                    </svg>
                    <h2 class="h4">Feature Three</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>
                </div>
            </div>
        </div>
    </section>
    <!-- END FEATURE SECTION -->

    <!-- ABOUT SECTION -->
    <section class="bg-2 py-12 text-center">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <h2>Lorem ipsum dolor sit amet, consectetur adipiscing</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.</p>
                </div>
            </div>
        </div>
    </section>
    <!-- END ABOUT SECTION -->

    <!-- IMAGE SECTION -->
    <section class="bg-1 py-12 text-center">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2>Lorem ipsum dolor</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.</p>
                </div>
                <div class="col-md-6">
                    <img class="img-fluid shadow" src="INSERT_FEATURE_IMAGE" alt="dark mockup">
                </div>
                <div class="col-md-6">
                    <img class="img-fluid shadow" src="INSERT_FEATURE_IMAGE" alt="light mockup">
                </div>
            </div>
        </div>
    </section>
    <!-- END IMAGE SECTION -->
@endsection
