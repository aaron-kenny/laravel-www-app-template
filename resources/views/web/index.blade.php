@extends('layouts.web')

@section('page-title', 'Homepage')

@push('meta')
    <meta name="description" content="INSERT_DESCRIPTION">

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
                    <p class="hero__description">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.</p>
                </div>
                <div class="col-lg-4">
                    <div class="hero__card">
                        <div class="hero__card-header">
                            <h2 class="hero__card-title">Get started for free</h2>
                        </div>
                        <div class="hero__card-body">
                            <form id="registrationForm">
                                @csrf
                                <div class="row">
                                    <div class="col-sm mb-4">
                                        <input class="form-control @error('first_name') is-invalid @enderror" type="text" name="first_name" placeholder="First name" required value="{{ old('first_name') }}">
                                        @error('first_name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-sm mb-4">
                                        <input class="form-control @error('last_name') is-invalid @enderror" type="text" name="last_name" placeholder="Last name" required value="{{ old('last_name') }}">
                                        @error('last_name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <input class="form-control @error('email') is-invalid @enderror" type="email" name="email" placeholder="Email address" required value="{{ old('email') }}" autocomplete="email">
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-4">
                                    <input class="form-control @error('password') is-invalid @enderror" type="password" name="password" placeholder="Password" required autocomplete="new-password">
                                    @error('password')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div>
                                    <button class="btn btn-primary w-100">Create your account</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <p class="hero__footnote">By creating an account, you agree to the <a href="{{ route('legal.terms') }}">terms of service</a></p>
                </div>
            </div>
        </div>
    </section>
    <!-- END HERO -->

    <!-- FEATURE SECTION -->
    <section class="bg-2 py-12 py-lg-14 text-center">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h2 class="mb-9">Lorem ipsum dolor sit amet</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <svg class="mh-9" viewBox="0 0 24 24">
                        <path fill="currentColor" d="M21,16.5C21,16.88 20.79,17.21 20.47,17.38L12.57,21.82C12.41,21.94 12.21,22 12,22C11.79,22 11.59,21.94 11.43,21.82L3.53,17.38C3.21,17.21 3,16.88 3,16.5V7.5C3,7.12 3.21,6.79 3.53,6.62L11.43,2.18C11.59,2.06 11.79,2 12,2C12.21,2 12.41,2.06 12.57,2.18L20.47,6.62C20.79,6.79 21,7.12 21,7.5V16.5M12,4.15L6.04,7.5L12,10.85L17.96,7.5L12,4.15Z" />
                    </svg>
                    <h2 class="h4">Feature One</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et.</p>
                </div>
                <div class="col-md-4">
                    <svg class="mh-9" viewBox="0 0 24 24">
                        <path fill="currentColor" d="M19.35,10.03C18.67,6.59 15.64,4 12,4C9.11,4 6.6,5.64 5.35,8.03C2.34,8.36 0,10.9 0,14A6,6 0 0,0 6,20H19A5,5 0 0,0 24,15C24,12.36 21.95,10.22 19.35,10.03Z" />
                    </svg>
                    <h2 class="h4">Feature Two</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                </div>
                <div class="col-md-4">
                    <svg class="mh-9" viewBox="0 0 24 24">
                        <path fill="currentColor" d="M4,6H20V16H4M20,18A2,2 0 0,0 22,16V6C22,4.89 21.1,4 20,4H4C2.89,4 2,4.89 2,6V16A2,2 0 0,0 4,18H0V20H24V18H20Z" />
                    </svg>
                    <h2 class="h4">Feature Three</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                </div>
            </div>
        </div>
    </section>
    <!-- END FEATURE SECTION -->

    <!-- PRODUCT SECTION -->
    <section class="py-12 py-lg-14">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-7">
                    <img class="img-fluid mb-4 shadow" src="INSERT_PATH_TO_FEATURE_IMAGE" alt="browser mockup">
                </div>
                <div class="col-md-5">
                    <h2>Lorem ipsum dolor sit amet, consectetur adipiscing elit</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore.</p>
                    <a class="btn btn-primary mb-4" href="{{ route('product.show', 'product_one') }}">Check it out</a>
                </div>
            </div>
        </div>
    </section>
    <!-- END PRODUCT SECTION -->

    <!-- GET STARTED SECTION -->
    <section class="py-10" style="background-image: url(INSERT_PATH_TO_IMAGE); background-size: cover;">
        <div class="container">
            <div class="row">
                <div class="col text-center">
                    <h2 class="mb-4 text-dark-bg">Get started for free</h2>
                    <a class="btn btn-primary btn-dark-bg" href="{{ route('register') }}">Create your account</a>
                </div>
            </div>
        </div>
    </section>
    <!-- END GET STARTED SECTION -->
@endsection

@push('scripts')
    <script>
        var mouseMoveListener = function () {
            document.removeEventListener('mousemove', mouseMoveListener, false);
            document.querySelector('#registrationForm').setAttribute('action', '{{ route('register') }}');
            document.querySelector('#registrationForm').setAttribute('method', 'POST');
        };

        document.addEventListener('mousemove', mouseMoveListener, false);
    </script>
@endpush