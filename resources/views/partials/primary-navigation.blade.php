<!-- PRIMARY NAVIGATION -->
<header class="primary-navigation">
    <div class="container">
        <div class="primary-navigation-group">
            <button class="primary-navigation-menu-button btn btn-menu-toggle" data-toggle-class="is-visible" data-target=".mobile-navigation,.mobile-navigation-overlay"></button>
            <div class="primary-navigation-logo-wrapper">
                <a href="{{ route('web.index') }}"><img src="INSERT_PATH_TO_APP_LOGO" alt="Logo"></a>
            </div>
            <div class="primary-navigation-links-wrapper">
                <a href="{{ route('product.index') }}">Products</a>
                <a href="{{ route('documentation.index') }}">Documentation</a>
                <a href="{{ route('support.index') }}">Support</a>
            </div>
        </div>
        <div class="primary-navigation-group">
            <button class="btn btn-theme-toggle" data-toggle-theme="dark"></button>
            @guest
                <a class="primary-navigation-login btn" href="{{ route('login') }}">Log in</a>
            @endguest
            @auth
                <div class="dropdown">
                    <button class="primary-navigation-avatar-button" data-toggle="dropdown" data-offset="0,10" aria-haspopup="true" aria-expanded="false" aria-label="Toggle account navigation">
                        <img src="{{ request()->user()->gravatar }}" alt="User avatar">
                    </button>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="{{ route('account.dashboard.index') }}">Account</a>
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logoutForm').submit();">Log out</a>
                        <form id="logoutForm" class="d-none" action="{{ route('logout') }}" method="POST">
                            @csrf
                        </form>
                    </div>
                </div>
            @endauth
        </div>
    </div>
</header>
<!-- END PRIMARY NAVIGATION -->