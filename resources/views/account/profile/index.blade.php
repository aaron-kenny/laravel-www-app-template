@extends('layouts.app')

@section('page-title', 'Profile')

@section('content')
    <div class="container">
        <h1 class="h2">Profile</h1>
        <div class="row gy-8">
            <div class="col-12">
                <div class="card card-solid fade-up">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-auto">
                                <img class="rounded-circle mh-10" src="{{ $gravatar }}">
                            </div>
                            <div class="col">
                                <p class="mb-0">{{ $full_name }}</p>
                                <p class="small mb-0">{{ $email }}</p>
                            </div>
                            <div class="col-md-auto">
                                <a class="btn btn-secondary w-100 mt-3 mt-md-0" href="{{ route('account.profile.edit') }}">Edit profile</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="card card-solid fade-up">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-auto">
                                <h2 class="h5 mb-0">Password</h2>
                            </div>
                            <div class="col">
                                <p class="mb-0">•••••••••••••</p>
                            </div>
                            <div class="col-md-auto">
                                <a class="btn btn-secondary w-100 mt-3 mt-md-0" href="{{ route('account.password.edit') }}">Change password</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- <div class="card fade-up">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col">
                                <h2>Deactivate account</h2>
                                <p>This will cancel all your subscriptions and deactivate your account. Please be sure you wish to do this.</p>
                            </div>
                            <div class="col-md-auto">
                                <a class="btn btn-danger-outline w-100 mt-3 mt-md-0" href="{{ route('account.profile.destroy') }}" onclick="event.preventDefault();document.getElementById('destroyAccount').submit();">Deactivate Account</a>
                                <form id="destroyAccount" action="{{ route('account.profile.destroy') }}" method="POST" style="display: none;">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </div>
                        </div>
                    </div>
                </div> -->
            </div>
        </div>
    </div>
@endsection
