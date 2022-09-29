@extends('layouts.blank')

@section('page-title', 'Reset your password')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-xl-4">
                <div class="d-flex justify-content-center align-items-center mb-8">
                    <img class="mh-5" src="INSERT_PATH_TO_LOGO" alt="Logo"/>
                </div>
                <div class="card">
                    <div class="card-body p-8">
                        <div class="text-center">
                            <h2 class="card-title h5 mb-8">Reset your password</h2>
                        </div>
                        <form action="{{ route('password.update') }}" method="POST">
                            @csrf
                            <input type="hidden" name="token" value="{{ $token }}">

                            <div class="mb-4">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus placeholder="Email address">
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password">
                                @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm password">
                            </div>
                            
                            <button class="btn btn-primary btn-block">Reset Password</button>
                        </form>
                    </div>
                </div>

                
            </div>
        </div>
    </div>
@endsection
