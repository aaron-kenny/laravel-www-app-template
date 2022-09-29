<!doctype html>
<html lang="en">
<head>
    @if(App::environment() == "production")
        <!-- Google Tag Manager -->
        INSERT_GOOGLE_TAG_MANAGER_SCRIPT
        <!-- End Google Tag Manager -->
    @endif

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#171717">
    <meta name="msapplication-navbutton-color" content="#171717">
    <meta name="apple-mobile-web-app-status-bar-style" content="#171717">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @stack('meta')

    <title>@yield('page-title')</title>

    <link rel="icon" href="INSERT_PATH_TO_FAVICON">

    <!-- AVOID FOUC -->
    <style>.hidden {display: none;}</style>
    <script>
        document.querySelector('html').classList.add('hidden');
        window.onload = function(event) {
            document.querySelector('html').classList.remove('hidden');
        };
    </script>
    <!-- END AVOID FOUC -->

    <!-- DARK MODE -->
    <script>if(localStorage.theme == 'dark'){document.querySelector('html').classList.add('dark');}</script>
    <!-- END DARK MODE -->

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="INSERT_PATH_TO_STYLESHEET" rel="stylesheet">

    <script src="INSERT_PATH_TO_JAVASCRIPT" defer></script>
</head>
<body>
    <!-- Google Tag Manager (noscript) -->
    INSERT_GOOGLE_TAG_MANAGER_NO_SCRIPT
    <!-- End Google Tag Manager (noscript) -->

    <!-- NAV OVERLAY -->
    <div class="nav-mobile-overlay" data-toggle-class="is-visible" data-target=".nav-mobile,.nav-mobile-overlay"></div>
    <!-- END NAV OVERLAY -->

    <!-- NAV DASHBOARD -->
    <div class="nav nav-mobile nav-dashboard">
        <div class="d-flex justify-content-between align-items-center py-4 px-6">
            <a href="{{ route('web.index') }}"><img class="img-fluid mh-5" src="INSERT_PATH_TO_APP_LOGO"/></a>
            <button class="btn btn-close d-lg-none" data-toggle-class="is-visible" data-target=".nav-mobile,.nav-mobile-overlay"></button>
        </div>
        <nav>
            <a class="nav-link" href="{{ route('account.dashboard.index') }}">Dashboard</a>
            <a class="nav-link" href="{{ route('account.profile.index') }}">Profile</a>
            <a class="nav-link" href="{{ route('subscriptions.index') }}">Subscriptions</a>
            <a class="nav-link" href="{{ route('account.billing.index') }}">Billing</a>
        </nav>
    </div>
    <!-- END NAV DASHBOARD -->

    <div class="ml-lg-16">
        <!-- MAIN SECTION -->

        <!-- NAVBAR -->
        <nav class="navbar bg-transparent">
            <div class="container-fluid justify-content-end">
                <button class="btn btn-theme-toggle mr-1" data-toggle-theme="dark"></button>
                <button class="btn btn-menu-toggle d-inline-block d-lg-none" data-toggle-class="is-visible" data-target=".nav-mobile,.nav-mobile-overlay"></button>
                <div class="dropdown">
                    <a href="#" data-toggle="dropdown">
                        <img class="rounded-circle mh-9" src="{{ request()->user()->gravatar }}">
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="{{ route('account.dashboard.index') }}">Account</a>
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logoutForm').submit();">Log out</a>
                        <form id="logoutForm" class="d-none" action="{{ route('logout') }}" method="POST">
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
        </nav>
        <!-- END NAVBAR -->

        @if (session('status'))
            <div class="container">
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            </div>
        @endif
        @if (session('error'))
            <div class="container">
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            </div>
        @endif
        @yield('content')
        <!-- END MAIN SECTION -->
    </div>

    @stack('scripts')
</body>
</html>