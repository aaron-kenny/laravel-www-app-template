@extends('layouts.blank')

@section('page-title', 'Register')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6 col-xl-4">
                <div class="d-flex justify-content-center align-items-center mb-8">
                    <img class="mh-5" src="INSERT_PATH_TO_LOGO" alt="Logo"/>
                </div>
                <div class="card card-solid">
                    <div class="card-body p-8">
                        <div class="text-center">
                            @if($subscription_name)
                                <h2 class="card-title h5 mb-0">Create your INSERT_APP_NAME account</h2>
                                <p class="mb-8">to continue to {{ ucfirst($subscription_name) }}</p>
                            @else
                                <h2 class="card-title h5 mb-8">Create your INSERT_APP_NAME account</h2>
                            @endif
                        </div>
                        <form id="registrationForm">
                            @csrf
                            <input type="hidden" name="subscription_name" value="{{ $subscription_name }}">
                            <input type="hidden" name="plan_id" value="{{ $plan_id }}">

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="mb-4">
                                        <input class="form-control @error('first_name') is-invalid @enderror" type="text" name="first_name" placeholder="First name" required value="{{ old('first_name') }}">
                                        @error('first_name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="mb-4">
                                        <input class="form-control @error('last_name') is-invalid @enderror" type="text" name="last_name" placeholder="Last name" required value="{{ old('last_name') }}">
                                        @error('last_name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
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
                            <button class="btn btn-primary btn-block">Create your account</button>
                        </form>

                    </div>
                    <div class="card-footer small text-center">
                        <a id="loginLink" href="{{ route('login', ['subscription_name' => $subscription_name, 'plan_id' => $plan_id]) }}">Already have an account? Log in</a>
                    </div>
                </div>
                <p class="small text-center mt-8">By creating an account, you agree to the <a href="{{ route('legal.terms') }}">Terms of Service</a> and <a href="{{ route('legal.privacy') }}">Privacy Policy</a></p>
            </div>
        </div>
    </div>
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