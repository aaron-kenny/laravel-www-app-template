@extends('layouts.app')

@section('page-title', 'Subscription details')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">

            <h2 class="h4">Current plan</h2>

            <!-- CURRENT SUBSCRIPTION CARD -->
            <div class="card card--highlighted fade-up">
                <div class="card-body">
                    <div class="row">
                        @if($subscription->cancelled())
                            <div class="col">
                                <h2 class="card-title mb-0">{{ ucfirst($subscription->name) }}</h2>
                                @if($subscription->stripe_plan->amount == 0)
                                    <p class="card-price mb-0">Free</p>
                                    <p class="small mb-0">Subscription canceled.</p>
                                    <p class="small mb-0">You will lose access on {{ $subscription->ends_at->format('M d, Y') }}.</p>
                                @else
                                    <p class="card-price mb-0">${{ $subscription->stripe_plan->amount / 100 }}<span class="card-price-time">/{{ $subscription->stripe_plan->interval }}</span></p>
                                    <p class="small mb-0">Subscription canceled. You will not be charged again.</p>
                                    <p class="small mb-0">You will lose access on {{ $subscription->ends_at->format('M d, Y') }}.</p>
                                @endif
                                <p class="small mb-md-0"><a href="#" onclick="event.preventDefault();document.getElementById('cancelSubscription{{ $subscription->id }}').submit();">Delete now and lose access</a></p>
                                <form id="cancelSubscription{{ $subscription->id }}" class="d-none" action="{{ route('subscriptions.destroy', $subscription->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <input type="hidden" name="cancel_action" value="cancel_now">
                                    <input type="hidden" name="subscription_name" value="{{ $subscription->name }}">
                                </form>
                            </div>
                            <div class="col-md-auto">
                                <a class="btn btn-sm btn-primary-outline mr-2" href="{{ config('product.product_one.url') }}">Launch</a>
                                <a class="btn btn-sm btn-primary" href="#" onclick="event.preventDefault();document.getElementById('resumeSubscription{{ $subscription->id }}').submit();">Resume subscription</a>
                                <form id="resumeSubscription{{ $subscription->id }}" class="d-none" action="{{ route('subscriptions.update', $subscription->id) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <input type="hidden" name="update_action" value="resume">
                                    <input type="hidden" name="subscription_name" value="{{ $subscription->name }}">
                                </form>
                            </div>
                        @else
                            <div class="col">
                                <h2 class="card-title mb-0">{{ ucfirst($subscription->name) }}</h2>
                                @if($subscription->stripe_plan->amount == 0)
                                    <p class="card-price mb-0">Free</p>
                                    <p class="small mb-md-0">Free subscription renewing on {{ date('M d, Y', $subscription->current_period_end ) }}.</p>
                                @else
                                    <p class="card-price mb-0">${{ $subscription->stripe_plan->amount / 100 }}<span class="card-price-time">/{{ $subscription->stripe_plan->interval }}</span></p>
                                    @if($subscription->onTrial())
                                        <p class="small mb-0">Free trial ending {{ $subscription->trial_ends_at->format('M d, Y') }}</p>
                                    @endif
                                    <p class="small mb-md-0">Next payment scheduled on {{ date('M d, Y', $subscription->current_period_end) }}.</p>
                                @endif
                            </div>
                            <div class="col-md-auto">
                                <a class="btn btn-sm btn-primary-outline mr-2" href="{{ config('product.product_one.url') }}">Launch</a>
                                <a class="btn btn-sm btn-danger-outline" href="#" onclick="event.preventDefault();document.getElementById('cancelSubscription{{ $subscription->id }}').submit();">Cancel subscription</a>
                                <form id="cancelSubscription{{ $subscription->id }}" class="d-none" action="{{ route('subscriptions.destroy', $subscription->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <input type="hidden" name="cancel_action" value="cancel">
                                    <input type="hidden" name="subscription_name" value="{{ $subscription->name }}">
                                </form>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            <!-- END CURRENT SUBSCRIPTION CARD -->

            <h2 class="h4">Available plans</h2>

            <!-- PLANS -->
            @foreach($plans as $plan)
                <div class="card fade-up">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <h2 class="card-title mb-0">{{ ucfirst($subscription->name) }} {{ $plan->nickname }}</h2>
                                @if($plan->amount == 0)
                                    <p class="card-price mb-md-0">Free</p>
                                @else
                                    <p class="card-price mb-md-0">${{ $plan->amount / 100 }}<span class="card-price-time">/{{ $plan->interval }}</span></p>
                                @endif
                            </div>
                            <div class="col-md-auto">
                                <button class="btn btn-sm btn-primary" onclick="event.preventDefault();document.getElementById('changePlan{{ $plan->id }}').submit();">Continue</button>
                                <form id="changePlan{{ $plan->id }}" class="d-none" action="{{ route('subscriptions.update', $subscription->id) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <input type="hidden" name="subscription_name" value="{{ $subscription->name }}">
                                    <input type="hidden" name="plan_id" value="{{ $plan->id }}">
                                    <input type="hidden" name="update_action" value="change_plan">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            <!-- END PLANS -->

            <div class="card fade-up">
                <div class="card-header">
                    <h2 class="card-title mb-0">Billing history</h2>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Number</th>
                                    <th>Description</th>
                                    <th>Amount</th>
                                    <th></th>
                                </tr>
                            </thead>
                            @if($invoices->isNotEmpty())
                                <tbody>
                                    @foreach($invoices as $invoice)
                                        <tr>
                                            <td>{{ date('M d, Y', ($invoice->created)) }}</td>
                                            <td>{{ $invoice->number }}</td>
                                            <td>
                                                @foreach($invoice->lines->data as $line_item)
                                                    {{ $line_item->description }}<br>
                                                @endforeach
                                            </td>
                                            <td>${{ number_format($invoice->total / 100, 2) }}</td>
                                            <td><a target="_blank" href="{{ $invoice->hosted_invoice_url }}">View Invoice</a></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            @endif
                        </table>
                    </div>
                    @if($invoices->isEmpty())
                        <p class="text-center my-5">You have no invoices.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
