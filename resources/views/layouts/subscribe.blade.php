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
    
    <div id="app" class="layout--subscribe">
        @if(session('status'))
            <div class="container">
                <div class="alert alert-success mt-5 mb-4">{{ session('status') }}</div>
            </div>
        @endif

        @yield('content')
    </div>

    @stack('scripts')
</body>
</html>
