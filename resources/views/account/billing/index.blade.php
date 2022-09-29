@extends('layouts.app')

@section('page-title', 'Billing')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="h2">Billing</h1>
            </div>
        </div>
    </div>

    @if($has_payment_method)
        <div class="container">
            <!-- PAYMENT METHOD -->
            <div class="row">
                <div class="col">
                    <div class="card card-bordered fade-up">
                        <div class="card-header">
                            <h2 class="card-title mb-0">Payment methods</h2>
                            <p class="card-subtitle small mb-0">The card marked as default will be used for all subscriptions.</p>
                        </div>
                        <div class="card-body p-lg-8">
                            @foreach($payment_methods as $payment_method)
                                <div class="row">
                                    <div class="col">
                                        <p class="mb-0">
                                            <strong>{{ ucfirst($payment_method->card->brand) }} ****{{ $payment_method->card->last4 }}</strong>&nbsp;
                                            @if($payment_method->id == $default_payment_method->id)
                                                <span class="tag">DEFAULT</span>
                                            @else
                                                <a class="small" href="#" onclick="event.preventDefault();document.getElementById('makeDefault{{ $payment_method->id }}').submit();">Make default</a>
                                            @endif
                                        </p>
                                        <p class="small mb-md-0">Expires {{ $payment_method->card->exp_month }}/{{ $payment_method->card->exp_year }}</p>
                                    </div>
                                    <div class="col-md-auto">
                                        <a class="btn btn-sm btn-primary-outline mr-2" href="{{ route('account.billing.edit', $payment_method->id) }}">Edit</a>
                                        @if($payment_method->id != $default_payment_method->id)
                                            <form id="makeDefault{{ $payment_method->id }}" class="d-none" action="{{ route('account.billing.update', $payment_method->id) }}" method="POST">
                                                @csrf
                                                @method('PATCH')
                                                <input type="hidden" name="update_action" value="make_default">
                                            </form>
                                        @endif
                                        @if($payment_method->id != $default_payment_method->id || !$has_valid_subscriptions)
                                            <a class="btn btn-sm btn-danger-outline" href="#" onclick="event.preventDefault();document.getElementById('delete{{ $payment_method->id }}').submit();">Delete</a>
                                            <form id="delete{{ $payment_method->id }}" class="d-none" action="{{ route('account.billing.destroy', $payment_method->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        @endif
                                    </div>
                                </div>
                                <hr>
                            @endforeach
                            <div class="row">
                                <div class="col-md-auto">
                                    <a class="btn btn-primary d-block" href="{{ route('account.billing.create') }}">Add payment method</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END PAYMENT METHOD -->
    @else
        <div class="container pb-8">
            <div class="row">
                <div class="col">
                    <div class="border-2 rounded text-center px-6 py-10">
                        <svg class="mh-12 fill-1 mb-6" viewBox="0 0 24 24">
                            <path d="M20 4H4A2 2 0 0 0 2 6V18A2 2 0 0 0 4 20H20A2 2 0 0 0 22 18V6A2 2 0 0 0 20 4M20 11H4V8H20Z" />
                        </svg>
                        <h1 class="h5 mb-6">Looks like you don't have any payment methods.</h1>
                        <a class="btn btn-primary" href="{{ route('account.billing.create') }}">Add payment method</a>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <!-- BILLING HISTORY -->
    <div class="container">
        <div class="row gy-8">
            <div class="col-12">
                <h2>Billing history</h2>
            </div>
            <div class="col-12">
                <div class="card card-bordered fade-up">
                    <div class="card-body p-lg-8">
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
                                            <!-- <td>{{ date('M d, Y', ($invoice->created)) }}</td> -->
                                            <td>{{ $invoice->date()->toFormattedDateString() }}</td>
                                            <td>{{ $invoice->number }}</td>
                                            <td>
                                                @foreach($invoice->lines->data as $line_item)
                                                    {{ $line_item->description }}<br>
                                                @endforeach
                                            </td>
                                            <td>{{ $invoice->total() }}</td>
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
    <!-- END BILLING HISTORY -->

@endsection
