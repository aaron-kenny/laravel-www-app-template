<!-- MOBILE NAVIGATION OVERLAY -->
<div class="mobile-navigation-overlay" data-toggle-class="is-visible" data-target=".mobile-navigation,.mobile-navigation-overlay"></div>
<!-- END MOBILE NAVIGATION OVERLAY -->

<!-- MOBILE NAVIGATION -->
<div class="mobile-navigation">
    <div class="mobile-navigation-header">
        <button class="btn btn-close" data-toggle-class="is-visible" data-target=".mobile-navigation,.mobile-navigation-overlay"></button>
        <a href="{{ route('web.index') }}"><img src="INSERT_PATH_TO_APP_LOGO" alt="Logo"></a>
    </div>
    <nav class="mobile-navigation-menu">
        <a href="{{ route('product.index') }}">Products</a>
        <a href="{{ route('documentation.index') }}">Documentation</a>
        <a href="{{ route('support.index') }}">Support</a>
    </nav>
</div>
<!-- END MOBILE NAVIGATION -->