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
    <link href="{{ mix('/css/web.css') }}" rel="stylesheet">

    <script src="{{ mix('/js/web.js') }}" defer></script>
</head>
<body class="pt-10">
    <!-- Google Tag Manager (noscript) -->
    INSERT_GOOGLE_TAG_MANAGER_NO_SCRIPT
    <!-- End Google Tag Manager (noscript) -->
    
    @include('partials.mobile-navigation')

    @include('partials.primary-navigation')


    @if(session('status'))
        <div style="position: absolute; left: 0; right: 0;top:0; margin-top: 75px;">
            <div class="container">
                <div class="alert alert-success">{{ session('status') }}</div>
            </div>
        </div>
    @endif

    @yield('content')

    @include('partials.footer-web')

    @stack('scripts')
</body>
</html>