@extends('layouts.app')

@section('page-title', 'Edit your profile')

@section('content')
<div class="container">
    <h1 class="h2">Edit your profile</h1>
    <div class="row">
        <div class="col">
            <div class="card card-solid fade-up">
                <div class="card-body p-lg-8">
                    <form action="{{ route('account.profile.update') }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row align-items-center mb-4">
                            <div class="col-sm-2">
                                <img class="rounded-circle mh-10" src="{{ $gravatar }}">
                            </div>
                            <div class="col-sm-10">
                                <small>Your image is pulled from Gravatar.<br>
                                <a href="https://en.gravatar.com/">Learn how to use Gravatar</a>.</small>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label class="col-xl-2 col-form-label" for="firstName">First name</label>
                            <div class="col-xl-10">
                                <input id="firstName" class="form-control form-control-solid @error('first_name') is-invalid @enderror" type="text" name="first_name" value="{{ old('first_name') ? old('first_name') : $first_name }}">
                                @error('first_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label class="col-xl-2 col-form-label" for="lastName">Last name</label>
                            <div class="col-xl-10">
                                <input id="lastName" class="form-control form-control-solid @error('last_name') is-invalid @enderror" type="text" name="last_name" value="{{ old('last_name') ? old('last_name') : $last_name }}">
                                @error('last_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label class="col-xl-2 col-form-label" for="email">Email address</label>
                            <div class="col-xl-10">
                                <input id="email" class="form-control form-control-solid @error('email') is-invalid @enderror" type="email" name="email" value="{{ old('email') ? old('email') : $email }}">
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label class="col-xl-2 col-form-label" for="emailConfirmation">Confirm email address</label>
                            <div class="col-xl-10">
                                <input id="emailConfirmation" class="form-control form-control-solid" type="email" name="email_confirmation" value="{{ old('email_confirmation') ? old('email_confirmation') : $email }}">
                                <p class="small form-text">If email address is changed, you will be restricted until you verify ownership.</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-auto">
                                <button class="btn btn-primary w-100">Save changes</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
