@extends('layouts.app')

@section('page-title', 'Change your password')

@section('content')
    <div class="container">
        <h1 class="h2">Change your password</h1>
        <div class="row">
            <div class="col">
                <div class="card card-solid fade-up">
                    <div class="card-body p-lg-8">
                        <form action="{{ route('account.password.update') }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="row mb-4">
                                <label class="col-xl-2 col-form-label" for="password">New password</label>
                                <div class="col-xl-10">
                                    <input id="password" class="form-control form-control-solid @error('password') is-invalid @enderror" type="password" name="password">
                                    @error('password')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-4">
                                <label class="col-xl-2 col-form-label" for="passwordConfirmation">Confirm password</label>
                                <div class="col-xl-10">
                                    <input id="passwordConfirmation" class="form-control form-control-solid" type="password" name="password_confirmation">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-auto">
                                    <button class="btn btn-primary w-100">Save password</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
