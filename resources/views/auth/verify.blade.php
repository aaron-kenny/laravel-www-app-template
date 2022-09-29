@extends('layouts.blank')

@section('page-title', 'Email verification')

@section('content')
    @if(session('resent'))
        <div class="container">
            <div class="alert alert-success mt-5 mb-4">A fresh verification link has been sent to your email address.</div>
        </div>
    @endif
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-xl-4">
                <div class="d-flex justify-content-center align-items-center mb-8">
                    <img class="mh-5" src="INSERT_PATH_TO_LOGO" alt="Logo"/>
                </div>
                <div class="card card-solid">
                    <div class="card-body text-center p-8">
                        <h2 class="card-title h5 mb-8">Verify your email address</h2>
                        <p>Before proceeding, please check your email for a verification link.
                        If you did not receive the email click the button below.</p>
                        <form action="{{ route('verification.resend') }}" method="POST">
                            @csrf
                            <button class="btn btn-primary">Send another verification email</button>.
                        </form>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
@endsection