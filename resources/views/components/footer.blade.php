<footer class="tech-footer text-white pt-5">
    <div class="container">
        <div class="row align-items-center mb-5">
            <div class="col-md-8 text-center text-md-start mb-4 mb-md-0">
                <h5 class="fw-bold text-uppercase mb-3 tech-footer-title">
                    {{ __('ui.revisorRequestTitle') }}
                    </h1>
                    <p class="small text-secondary opacity-75 mb-4">{{ __('ui.revisorRequestSubtitle') }}</p>

                    <a href="{{ route('become.revisor') }}" class="btn-cyber-small">
                        {{ __('ui.revisorButton') }}
                    </a>
            </div>

            <div class="col-md-4 text-center text-md-end">
                <p class="small text-uppercase mb-4 fw-light text-neon" style="letter-spacing: 3px;">System_Connect</p>
                <div class="d-flex justify-content-center justify-content-md-end gap-3">
                    <a href="#!" class="social-icon-tech"><i class="fab fa-facebook-f"></i></a>
                    <a href="#!" class="social-icon-tech"><i class="fab fa-x-twitter"></i></a>
                    <a href="#!" class="social-icon-tech"><i class="fab fa-instagram"></i></a>
                    <a href="#!" class="social-icon-tech"><i class="fab fa-github"></i></a>
                </div>
            </div>
        </div>

        <hr class="footer-divider">

        <div class="row py-4 align-items-center">
            <div class="col-md-6 text-center text-md-start">
                <p class="mb-0 small text-secondary fw-light">
                    © 2024 <span class="fw-bold text-white">CYBER<span class="text-neon">PRESTO</span></span> -
                    [LOG_OFF_SECURE]
                </p>
            </div>
            <div class="col-md-6 text-center text-md-end">
                <ul class="list-inline mb-0 small mt-3 mt-md-0">
                    <li class="list-inline-item">
                        <a href="#" class="footer-link-secondary">Privacy Policy</a>
                    </li>
                    <li class="list-inline-item ms-3">
                        <a href="#" class="footer-link-secondary">Terms of Service</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</footer>
