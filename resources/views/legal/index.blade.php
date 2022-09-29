@extends('layouts.web')

@section('page-title', 'Legal Documents')

@section('content')
    <!-- LEGAL SECTION -->
    <section class="bg-2 py-12">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <h1>Legal</h1>
                    <nav class="d-flex flex-column">
                        <a class="py-1" href="{{ route('legal.terms') }}">Terms of Service</a>
                        <a class="py-1" href="{{ route('legal.privacy') }}">Privacy Policy</a>
                        <a class="py-1" href="{{ route('legal.acceptable-use') }}">Acceptable Use Policy</a>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- END LEGAL SECTION -->
@endsection
