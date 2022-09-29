@extends('layouts.blank')

@section('page-title', 'Log in')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-xl-4">
                <div class="d-flex justify-content-center align-items-center mb-8">
                    <img class="mh-5" src="INSERT_PATH_TO_LOGO" alt="Logo"/>
                </div>
                <div class="card card-solid">
                    <div class="card-body p-8">
                        <div class="text-center">
                            @if($subscription_name)
                                <h2 class="card-title h5 mb-0">Log in to your account</h2>
                                <p class="mb-8">to continue to {{ ucfirst($subscription_name) }}</p>
                            @else
                                <h2 class="card-title h5 mb-8">Log in to your account</h2>
                            @endif
                        </div>
                        <form action="{{ route('login') }}" method="POST">
                            @csrf
                            <input type="hidden" name="subscription_name" value="{{ $subscription_name }}">
                            <input type="hidden" name="plan_id" value="{{ $plan_id }}">
                            <div class="mb-4">
                                <input id="email" type="email" class="form-control form-control-solid @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email" autofocus>
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <input id="password" type="password" class="form-control form-control-solid @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">
                                @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <div class="form-check">
                                    <input id="remember" class="form-check-input form-check-input-solid" type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="remember">
                                        Remember me
                                    </label>
                                </div>
                            </div>

                            <button class="btn btn-primary btn-block">Log in</button>
                        </form>
                    </div>
                    <div class="card-footer small text-center">
                        @if (Route::has('password.request'))<a href="{{ route('password.request') }}">Reset password</a> &nbsp;&bull;&nbsp; @endif<a id="registerLink" href="{{ route('register', ['subscription_name' => $subscription_name, 'plan_id' => $plan_id]) }}">Create an account</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
