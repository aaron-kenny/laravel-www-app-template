@extends('layouts.app')

@section('page-title', 'Dashboard')

@section('content')
    <div class="container">
        <h1>Your products</h1>
        @if($subscriptions->isNotEmpty())
            <p>Products you have active subscriptions or trials for.</p>
            <div class="row">
                @foreach($subscriptions as $subscription)
                    <div class="col-lg-3">
                        <div class="card card-solid hover-translate">
                            <div class="card-body d-flex align-items-center">
                                <img class="mh-8 mr-4" src="INSERT_PATH_TO_ICON/{{ $subscription->name }}.webp">
                                <div>
                                    <h2 class="card-title h5 mb-0">{{ ucfirst($subscription->name) }}</h2>
                                </div>
                                <a class="stretched-link" href="{{ config('product.' . $subscription->name . '.url') }}"></a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="border-2 rounded text-center px-6 py-10">
                <svg class="mh-12 fill-1 mb-6" viewBox="0 0 24 24">
                    <path d="M21,16.5C21,16.88 20.79,17.21 20.47,17.38L12.57,21.82C12.41,21.94 12.21,22 12,22C11.79,22 11.59,21.94 11.43,21.82L3.53,17.38C3.21,17.21 3,16.88 3,16.5V7.5C3,7.12 3.21,6.79 3.53,6.62L11.43,2.18C11.59,2.06 11.79,2 12,2C12.21,2 12.41,2.06 12.57,2.18L20.47,6.62C20.79,6.79 21,7.12 21,7.5V16.5M12,4.15L6.04,7.5L12,10.85L17.96,7.5L12,4.15Z" />
                </svg>
                <h1 class="h5 mb-6">Looks like you don't have any products yet.</h1>
                <a class="btn btn-primary" href="{{ route('product.index') }}">Explore our products</a>
            </div>
        @endif
    </div>
@endsection