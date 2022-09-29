@extends('layouts.web')

@section('page-title', 'Create Support Request')

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
                <div class="col">
                    <h1 class="hero-title">Support</h1>
                </div>
            </div>
        </div>
    </section>
    <!-- END HERO -->

    <!-- CONTACT SECTION -->
    <section class="bg-2 py-12">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="mb-5">
                        <a class="font-weight-medium mb-5" href="{{ route('support.index') }}">
                            <svg class="mh-5 mw-5 mb-1" viewBox="0 0 24 24">
                                <path d="M20,11V13H8L13.5,18.5L12.08,19.92L4.16,12L12.08,4.08L13.5,5.5L8,11H20Z" />
                            </svg> FAQs
                        </a>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h2 class="card-title mb-0">Support request</h2>
                            <p class="small mb-0">Have a question? Send us a message using the form below and someone from our team will be in touch soon.</p>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('support.store') }}" method="POST">
                                @csrf

                                <div class="mb-4">
                                    <label class="form-label" for="name">Name</label>
                                    <input id="name" class="form-control @error('name') is-invalid @enderror" type="text" name="name" value="{{ old('name') }}" required>
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-4">
                                    <label class="form-label" for="email">Email</label>
                                    <input id="email" class="form-control @error('email') is-invalid @enderror" type="email" name="email" value="{{ old('email') }}" required>
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-4">
                                    <label class="form-label" for="message">Message</label>
                                    <textarea id="message" class="form-control @error('message') is-invalid @enderror" name="message" value="{{ old('message') }}" required></textarea>
                                    @error('message')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <button class="btn btn-primary">Send Support Request</button>
                            </form>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </section>
    <!-- END CONTACT SECTION -->
@endsection
