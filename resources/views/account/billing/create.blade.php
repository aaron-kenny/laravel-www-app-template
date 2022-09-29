@extends('layouts.app')

@section('page-title', 'Add payment method')

@section('content')
    <div class="container">
        <h1 class="h2">Add payment method</h1>
        <div class="row">
            <div class="col">
                <div class="card card-bordered fade-up">
                    <div class="card-header">
                        <h2 class="card-title mb-0">Add card</h2>
                    </div>
                    <div class="card-body p-lg-8">
                        <form id="paymentForm" data-secret="{{ $setup_intent->client_secret }}" action="{{ route('account.billing.store') }}" method="POST">
                            @csrf
                            <div class="mb-4">
                                <div id="cardElement" class="form-control"></div>
                                <div id="cardErrors" class="invalid-feedback d-none"></div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <button id="paymentButton" class="btn btn-primary">Save payment method</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
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
@endpush