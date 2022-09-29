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
                    <div class="card-body">
                        <div class="text-center">
                            <h2 class="card-title h5 mb-8">Reset your password</h2>
                        </div>
                        <form action="{{ route('password.email') }}" method="POST">
                            @csrf

                            <div class="mb-4">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email address">
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <button class="btn btn-primary btn-block">Send Password Reset Link</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
