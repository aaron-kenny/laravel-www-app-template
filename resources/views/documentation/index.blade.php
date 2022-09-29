@extends('layouts.web')

@section('page-title', 'Documentation')

@section('content')
    <div class="bg-2 py-12">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    @include('partials.navigation-docs')
                </div>

                <div class="col-md-9">
                    <h1>Documentation</h1>

                    <h2>Introduction</h2>
                    <p>Browse the documentation for each of our products or get help in our <a href="{{ route('support.index') }}">support center</a> if you have questions that you can't find the answer to.</p>

                </div>
            </div>
        </div>
    </div>
@endsection
