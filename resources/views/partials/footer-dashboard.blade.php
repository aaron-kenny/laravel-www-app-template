<div class="container">
    <footer class="footer">
        <div class="row align-items-center">
            <div class="col-auto">
                <div class="footer__social-icon-container">
                    <a class="footer__social-icon" href="https://www.instagram.com"><i class="fab fa-instagram"></i></a>
                    <a class="footer__social-icon" href="https://www.facebook.com"><i class="fab fa-facebook"></i></a>
                    <a class="footer__social-icon" href="https://www.linkedin.com"><i class="fab fa-linkedin"></i></a>
                </div>
            </div>
            <div class="col-12 col-lg">
                <a class="footer__link" href="{{ route('web.about') }}">About</a>
                <a class="footer__link" href="{{ route('legal.terms') }}">Terms</a>
                <a class="footer__link" href="{{ route('legal.privacy') }}">Privacy</a>
                <a class="footer__link" href="{{ route('support.index') }}">Support</a>
            </div>
            <div class="col-12 col-lg-auto">
                <p class="footer__copyright">&copy; @php echo date('Y') @endphp INSERT_APP_NAME. All rights reserved.</p>
            </div>
        </div>
    </footer>
</div>