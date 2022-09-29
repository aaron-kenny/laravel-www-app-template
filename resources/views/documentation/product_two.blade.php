@extends('layouts.web')

@section('page-title', 'Product Two Documentation')

@section('content')
    <div class="bg-2 py-12">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    @include('partials.navigation-docs')
                </div>

                <div class="col-md-9">
                    <h1>Product Two Documentation</h1>

                    <h2>Introduction</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

                </div>
            </div>
        </div>
    </div>
@endsection
