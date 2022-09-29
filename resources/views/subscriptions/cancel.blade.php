@extends('layouts.app')

@section('page-title', 'Cancel plan')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="h2">Cancel your plan</h1>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <!-- CANCEL PLAN CARD -->
                <div class="card card-bordered fade-up">
                    <div class="card-body p-lg-8">
                        <div class="row">
                            <div class="col">
                                <h2 class="card-title mb-0">{{ ucfirst($subscription->name) }}</h2>

                                @if($subscription->stripe_plan->amount == 0)
                                    <p>Free</p>
                                    <p>Your plan will be canceled, but is still available until {{ date('M d, Y', $subscription->current_period_end ) }}.</p>
                                @elseif($subscription->onTrial())
                                    <p>${{ $subscription->stripe_plan->amount / 100 }}<span class="text-muted">/{{ $subscription->stripe_plan->interval }}</span></p>
                                    <p>Your free trial will be canceled and you will not be charged. You will still have access until {{ $subscription->trial_ends_at->format('M d, Y') }}</p>
                                @else
                                    <p>${{ $subscription->stripe_plan->amount / 100 }}<span class="text-muted">/{{ $subscription->stripe_plan->interval }}</span></p>
                                    <p>Your plan will be canceled, but is still available until {{ date('M d, Y', $subscription->current_period_end) }}.</p>
                                @endif

                                <p>If you change your mind, you can renew your subscription.</p>
                                <button class="btn btn-danger" onclick="event.preventDefault();document.getElementById('cancelSubscription').submit();">Cancel plan</button>
                                <form id="cancelSubscription" class="d-none" action="{{ route('subscriptions.destroy', $subscription->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <input type="hidden" name="subscription_name" value="{{ $subscription->name }}">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END CANCEL PLAN CARD -->
            </div>
        </div>
    </div>
@endsection
