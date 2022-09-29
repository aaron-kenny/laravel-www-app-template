@extends('layouts.app')

@section('page-title', 'Change plan')

@section('content')
    <div class="container">
        <h1>Confirm your new plan</h1>
        <div class="row">
            <div class="col">
                <h2 class="h5">Changing to</h2>
                <!-- CURRENT SUBSCRIPTION CARD -->
                <div class="card card-bordered fade-up">
                    <div class="card-body p-lg-8">
                        <div class="row">
                            <div class="col">
                                <h2 class="card-title mb-0">{{ ucfirst($subscription->name) }}</h2>
                                @if($subscription->stripe_plan->amount == 0)
                                    <p class="mb-0">Free</p>
                                @else
                                    <p class="mb-0">${{ $subscription->stripe_plan->amount / 100 }}<span class="text-muted">/{{ $subscription->stripe_plan->interval }}</span></p>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-md-5">
                                <button class="btn btn-primary w-100">Confirm</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END CURRENT SUBSCRIPTION CARD -->

            </div>
        </div>
    </div>
@endsection
