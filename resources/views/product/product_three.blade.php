@extends('layouts.web')

@section('page-title', 'Product Three')

@push('meta')
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ request()->url() }}">
    <meta property="og:title" content="INSERT_TITLE">
    <meta property="og:description" content="INSERT_DESCRIPTION">
    <meta property="og:image" content="INSERT_PATH_TO_TWITTER_CARD_IMAGE">
    <meta property="fb:app_id" content="710045479823174">

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
                        <img src="INSERT_PATH_TO_PRODUCT_LOGO" alt="Logo">
                        <p>Product Three</p>
                    </div>
                    <h1 class="hero__title">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</h1>
                    <a class="btn btn-primary btn-dark-bg" href="#">Download</a>
                    <a class="btn btn-primary-outline btn-dark-bg" href="#">GitHub</a>
                </div>
            </div>
        </div>
    </section>
    <!-- END HERO -->

    <!-- FEATURE SECTION -->
    <section class="bg-2 py-12 text-center">
        <div class="container">
            <div class="row">
                <div class="col">
                    <img class="img-fluid" src="INSERT_PATH_TO_FEATURE_IMAGE" alt="Feature">
                </div>
            </div>
        </div>
    </section>
    <!-- END FEATURE SECTION -->
@endsection
