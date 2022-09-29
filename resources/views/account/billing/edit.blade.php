@extends('layouts.app')

@section('page-title', 'Edit payment method')

@section('content')
<div class="container">
    <h1 class="page__title">Edit payment method</h1>
    <div class="row">
        <div class="col">
            <div class="card fade-up">
                <div class="card-header">
                    <h2 class="card-title mb-0">{{ ucfirst($payment_method->card->brand) }} ****{{ $payment_method->card->last4 }}</h2>
                </div>
                <div class="card-body">
                    <form id="paymentForm" action="{{ route('account.billing.update', $payment_method->id) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <input type="hidden" name="update_action" value="update_card">

                        <div class="form-group row">
                            <label class="col-xl-2 col-form-label" for="expMonth">Expiration month</label>
                            <div class="col-xl-10">
                                <input id="expMonth" class="form-control @error('exp_month') is-invalid @enderror" type="number" min="1" max="12" name="exp_month" value="{{ old('exp_month') ?? $payment_method->card->exp_month }}">
                                @error('exp_month')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-xl-2 col-form-label" for="expYear">Expiration year</label>
                            <div class="col-xl-10">
                                <input id="expYear" class="form-control @error('exp_year') is-invalid @enderror" type="number" min="{{ date('Y') }}" name="exp_year" value="{{ old('exp_year') ?? $payment_method->card->exp_year }}">
                                @error('exp_year')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-auto">
                                <button id="paymentButton" class="btn btn-primary w-100">Save payment method</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
