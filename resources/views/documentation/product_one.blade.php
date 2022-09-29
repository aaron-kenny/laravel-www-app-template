@extends('layouts.web')

@section('page-title', 'Product One Documentation')

@section('content')
    <div class="bg-2 py-12 text-break">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    @include('partials.navigation-docs')
                </div>

                <div class="col-md-9">

                    <h1>Product One Documentation</h1>

                    <h2 id="introduction">Introduction</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

                    <h2>Prerequisites</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>


                    <pre>
{
    "apiToken": "74acf539-ba76-46aa-4a658d59effd",
    "broker": "testBroker",
    "action": "placeOrder",
    ...
}</pre>
                    <h3>Lorum</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                    <div class="card mb-4">
                        <div class="card-body d-flex align-items-center">
                            <div class="position-relative w-9 h-9 min-w-9 p-3 card-badge mr-3">
                                <svg class="fill-1 mh-8 mw-8" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" viewBox="0 0 24 24">
                                    <path d="M13 14H11V9H13M13 18H11V16H13M1 21H23L12 2L1 21Z" />
                                </svg>
                            </div>
                            <div>
                                <p class="card-text mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
