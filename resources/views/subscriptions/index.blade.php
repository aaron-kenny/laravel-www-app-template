@extends('layouts.app')

@section('page-title', 'Subscriptions')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="h2">Subscriptions</h1>
            </div>
        </div>
    </div>

    @if($subscriptions->isNotEmpty())
        <div class="container">
            <div class="row gy-8">
                @foreach($subscriptions as $subscription)
                    <div class="col">
                        <div class="card card-solid fade-up">
                            <div class="card-body p-lg-8">
                                <div class="row">
                                    @if($subscription->cancelled())
                                        <div class="col">
                                            <h2 class="card-title mb-0">{{ ucfirst($subscription->name) }} <span class="badge">Canceled</span></h2>
                                            @if($subscription->stripe_plan->amount == 0)
                                                <p>Free</p>
                                                <p class="mb-0"><i class="fas fa-calendar"></i> Your plan will be canceled on {{ $subscription->ends_at->format('M d, Y') }}.</p>
                                            @else
                                                <p>${{ $subscription->stripe_plan->amount / 100 }}<span class="text-muted">/{{ $subscription->stripe_plan->interval }}</span></p>
                                                <p class="mb-0"><i class="fas fa-calendar"></i> Your plan will be canceled on {{ $subscription->ends_at->format('M d, Y') }}.</p>
                                            @endif
                                        </div>
                                        <div class="col-md-auto">
                                            <a class="btn btn-primary" href="{{ route('subscriptions.renew', ['id' => $subscription->id]) }}">Renew plan</a>
                                        </div>
                                    @else
                                        <div class="col">
                                            <h2 class="card-title mb-0">{{ ucfirst($subscription->name) }} <a class="btn btn-secondary" href="{{ config('product.product_one.url') }}">Launch</a></h2>
                                            @if($subscription->stripe_plan->amount == 0)
                                                <p class="mb-0">Free</p>
                                                <p class="small mb-md-0">Your plan renews on {{ date('M d, Y', $subscription->current_period_end ) }}.</p>
                                            @elseif($subscription->onTrial())
                                                <p class="mb-0">${{ $subscription->stripe_plan->amount / 100 }}<span class="text-muted">/{{ $subscription->stripe_plan->interval }}</span></p>
                                                <p class="small mb-md-0">Your free trial ends on {{ $subscription->trial_ends_at->format('M d, Y') }}</p>
                                            @else
                                                <p class="mb-0">${{ $subscription->stripe_plan->amount / 100 }}<span class="text-muted">/{{ $subscription->stripe_plan->interval }}</span></p>
                                                <p class="small mb-md-0">Your plan renews on {{ date('M d, Y', $subscription->current_period_end) }}.</p>
                                            @endif
                                        </div>
                                        <div class="col-md-auto">
                                            <a class="btn btn-primary mr-2" href="{{ route('subscriptions.change', ['id' => $subscription->id]) }}">Update plan</a>
                                            <a class="btn btn-danger-outline" href="{{ route('subscriptions.cancel', ['id' => $subscription->id]) }}">Cancel plan</a>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @else
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="border-2 rounded text-center px-6 py-10">
                        <svg class="mh-12 fill-1 mb-6" viewBox="0 0 24 24">
                            <path d="M21,16.5C21,16.88 20.79,17.21 20.47,17.38L12.57,21.82C12.41,21.94 12.21,22 12,22C11.79,22 11.59,21.94 11.43,21.82L3.53,17.38C3.21,17.21 3,16.88 3,16.5V7.5C3,7.12 3.21,6.79 3.53,6.62L11.43,2.18C11.59,2.06 11.79,2 12,2C12.21,2 12.41,2.06 12.57,2.18L20.47,6.62C20.79,6.79 21,7.12 21,7.5V16.5M12,4.15L6.04,7.5L12,10.85L17.96,7.5L12,4.15Z" />
                        </svg>
                        <h1 class="h5 mb-6">Looks like you don't have any subscriptions yet.</h1>
                        <a class="btn btn-primary" href="{{ route('product.index') }}">Explore our products</a>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection
