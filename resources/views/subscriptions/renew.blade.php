@extends('layouts.app')

@section('page-title', 'Renew plan')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">

            <h1 class="h4 text-center mb-4">Renew your plan</h1>

            <!-- RENEW PLAN CARD -->
            <div class="card fade-up">
                <div class="card-body">
                    <div class="row">
                        <div class="col">

                            <h2 class="card-title mb-0">{{ ucfirst($subscription->name) }}</h2>

                            @if($subscription->stripe_plan->amount == 0)
                                <p class="card-price">Free</p>
                                <p>This plan will no longer be canceled. It will renew on {{ date('M d, Y', $subscription->current_period_end ) }}.</p>
                            @elseif($subscription->onTrial())
                                <p class="card-price">${{ $subscription->stripe_plan->amount / 100 }}<span class="card-price-time">/{{ $subscription->stripe_plan->interval }}</span></p>
                                <p>This plan will no longer be canceled. It will renew on {{ $subscription->trial_ends_at->format('M d, Y') }}</p>
                            @else
                                <p class="card-price">${{ $subscription->stripe_plan->amount / 100 }}<span class="card-price-time">/{{ $subscription->stripe_plan->interval }}</span></p>
                                <p>This plan will no longer be canceled. It will renew on {{ date('M d, Y', $subscription->current_period_end) }}.</p>
                            @endif


                        </div>
                    </div>

                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col-md-4">
                            <button class="btn btn-primary w-100 mb-3" onclick="event.preventDefault();document.getElementById('renewPlan').submit();">Renew plan</button>
                            <form id="renewPlan" class="d-none" action="{{ route('subscriptions.update', $subscription->id) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <input type="hidden" name="update_action" value="renew">
                                <input type="hidden" name="subscription_name" value="{{ $subscription->name }}">
                            </form>
                            <p class="small">By renewing your plan, you agree to the <a href="">Terms of Service</a> and <a href="">Privacy Policy</a>.</p>

                        </div>
                    </div>

                </div>
            </div>
            <!-- END RENEW PLAN CARD -->
        </div>
    </div>
</div>
@endsection
