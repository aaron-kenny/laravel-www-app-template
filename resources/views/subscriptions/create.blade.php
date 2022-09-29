@extends('layouts.subscribe')

@section('page-title', 'Subscribe to ' . ucfirst($subscriptionName))

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5">
                <div class="d-flex justify-content-center align-items-center mb-8">
                    <img class="mh-5" src="INSERT_PATH_TO/{{ $subscriptionName }}.webp" alt="{{ $subscriptionName }} Logo"/>
                    <p>{{ $subscriptionName }}</p>
                </div>
                <div class="card text-center fade-up">
                    <div class="card-body">
                        <p class="card-price">${{ $plan->amount / 100 }}<span class="card-price-time">/{{ $plan->interval }}</span></p>


                        <form id="paymentForm" action="{{ route('subscriptions.store') }}" data-secret="{{ $setupIntent->client_secret }}" method="POST">
                            @csrf
                            <input type="hidden" name="subscription_name" value="{{ $subscriptionName }}">
                            <input type="hidden" name="plan_id" value="{{ $plan->id }}">
                            @if(!$previouslySubscribed)
                                <input type="hidden" name="free_trial" value="true">
                            @endif

                            @if(!$hasDefaultPaymentMethod)
                                <div class="form-group py-1">
                                    <div id="cardElement" class="form-control"></div>
                                    <div id="cardErrors" class="invalid-feedback d-none"></div>
                                </div>
                            @endif
                            @if($previouslySubscribed && $hasDefaultPaymentMethod)
                                <button id="paymentButton" class="btn btn-primary w-100 mb-3">Pay ${{ $plan->amount / 100 }} with {{ $cardBrand }} ****{{ $cardLastFour }} and Subscribe</button>
                                <a class="small mb-0" href="{{ route('account.billing.index') }}">Change payment method</a>
                            @elseif($previouslySubscribed && !$hasDefaultPaymentMethod)
                                <button id="paymentButton" class="btn btn-primary w-100 mb-3">Pay ${{ $plan->amount / 100 }} and Subscribe</button>
                            @elseif(!$previouslySubscribed && $hasDefaultPaymentMethod)
                                <button id="paymentButton" class="btn btn-primary w-100 mb-3">Start {{ $trialDays }} day free trial</button>
                                <p class="small mb-0">{{ $cardBrand }} ****{{ $cardLastFour }} will be charged at the end of the trial unless canceled.</p>
                                <a class="small mb-0" href="{{ route('account.billing.index') }}">Change payment method</a>
                            @elseif(!$previouslySubscribed && !$hasDefaultPaymentMethod)
                                <button id="paymentButton" class="btn btn-primary w-100 mb-3">Start {{ $trialDays }} day free trial</button>
                                <p class="small mb-0">Your credit card will be charged at the end of the trial unless canceled.</p>
                            @endif
                        </form>
                    </div>
                </div>


                <p class="text-center small">By subscribing, you agree to the <a href="{{ route('legal.terms') }}">Terms of Service</a> and <a href="{{ route('legal.privacy') }}">Privacy Policy</a>.<br>You will be charged on a recurring basis according to the plan details.<br>You may cancel your subscription at any time.</p>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    @if(!$hasDefaultPaymentMethod)
        <script src="https://js.stripe.com/v3/"></script>
        <script>
            var stripe = Stripe('{{ config('services.stripe.key') }}');

            var style = {
                base: {
                    fontFamily: 'Roboto, sans-serif',
                    fontSize: '16px',
                    color: '#636363',
                    '::placeholder': {
                        color: '#636363'
                    },
                    iconColor: '#fff',
                },
                invalid: {
                    color: '#ed5a5a',
                    iconColor: '#ed5a5a'
                }
            };

            var elements = stripe.elements();
            var card = elements.create('card', {style: style});
            card.mount('#cardElement');
            var cardElement = document.getElementById('cardElement');

            card.addEventListener('change', function(event) {
                var cardErrors = document.getElementById('cardErrors');
                if (event.error) {
                    cardErrors.textContent = event.error.message;
                    cardElement.classList.add('is-invalid');
                    cardErrors.classList.remove('d-none');
                } else {
                    cardErrors.textContent = '';
                    cardElement.classList.remove('is-invalid');
                    cardErrors.classList.add('d-none');
                }
            });

            var form = document.getElementById('paymentForm');
            var paymentButton = document.getElementById('paymentButton');
            var clientSecret = form.dataset.secret;

            paymentButton.addEventListener('click', function(event) {
                event.preventDefault();
                stripe.confirmCardSetup(clientSecret, {
                    payment_method: {
                        card: card,
                    },
                }).then(function(result) {
                    if(result.error) {
                        // Display error.message in your UI.
                        document.getElementById('cardErrors').innerText = result.error.message;
                    } else {
                        // The setup has succeeded. Display a success message and send
                        // result.setupIntent.payment_method to your server to save the
                        // card to a Customer
                        var hiddenInput = document.createElement('input');
                        hiddenInput.setAttribute('type', 'hidden');
                        hiddenInput.setAttribute('name', 'payment_method');
                        hiddenInput.setAttribute('value', result.setupIntent.payment_method);
                        form.appendChild(hiddenInput);

                        // Submit the form
                        form.submit();
                    }
                });
            });
        </script>
    @endif
@endpush
