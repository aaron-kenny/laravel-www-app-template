@extends('layouts.web')

@section('page-title', 'Terms of Service')

@section('content')
    <!-- TERMS SECTION -->
    <section class="bg-2 py-12">
        <div class="container">
            
            <div class="row justify-content-center">
                <div class="col-lg-9">
                    <div class="mb-5">
                        <a class="text-uppercase font-weight-medium mb-5" href="{{ route('legal.index') }}">
                            <svg class="mh-5 mw-5 mb-1" viewBox="0 0 24 24">
                                <path d="M20,11V13H8L13.5,18.5L12.08,19.92L4.16,12L12.08,4.08L13.5,5.5L8,11H20Z" />
                            </svg> Legal
                        </a>
                    </div>
                    <article>
                        <h1>Terms of Service</h1>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                    </article>
                </div>
            </div>

        </div>
    </section>
    <!-- END TERMS SECTION -->
@endsection
