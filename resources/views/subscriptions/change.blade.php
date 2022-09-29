@extends('layouts.app')

@section('page-title', 'Change plan')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="h2">Change your plan</h1>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row gy-8">
            <div class="col-12">
                <h2 class="h5">Current plan</h2>
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
                </div>
                <!-- END CURRENT SUBSCRIPTION CARD -->
            </div>

            <div class="col-12">
                <h2 class="h5">Available plans</h2>
                <!-- PLANS -->
                @foreach($plans as $plan)
                    <div class="card card-bordered fade-up">
                        <div class="card-body p-lg-8">
                            <div class="row">
                                <div class="col">
                                    <h2 class="card-title mb-0">{{ ucfirst($subscription->name) }} {{ $plan->nickname }}</h2>
                                    @if($plan->amount == 0)
                                        <p class="mb-md-0">Free</p>
                                    @else
                                        <p class="mb-md-0">${{ $plan->amount / 100 }}<span class="text-muted">/{{ $plan->interval }}</span></p>
                                    @endif
                                </div>
                                <div class="col-md-auto">
                                    <a class="btn btn-primary" href="{{ route('subscriptions.preview', ['id' => $subscription->id, 'plan_id' => $plan->id]) }}">Continue</a>

                                    <!-- <button class="btn btn-sm btn-primary" onclick="event.preventDefault();document.getElementById('changePlan{{ $plan->id }}').submit();">Continue</button>
                                    <form id="changePlan{{ $plan->id }}" class="d-none" action="{{ route('subscriptions.update', $subscription->id) }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <input type="hidden" name="subscription_name" value="{{ $subscription->name }}">
                                        <input type="hidden" name="plan_id" value="{{ $plan->id }}">
                                        <input type="hidden" name="update_action" value="change_plan">
                                    </form> -->
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                <!-- END PLANS -->

            </div>
        </div>
    </div>
@endsection
