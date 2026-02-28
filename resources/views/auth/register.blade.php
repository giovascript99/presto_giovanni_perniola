<x-layout>
    <div class="container-fluid min-vh-100 d-flex pt-5 justify-content-center tech-main-section">
        <div class="col-12 col-md-6 col-lg-4 py-5">

            <div class="text-center mb-4">
                <h1 class="display-4 fw-bold text-white tech-glow-text text-uppercase">{{ __('ui.register') }}</h1>
                <p class="tech-subtitle-small">CREATE_NEW_IDENTITY</p>
            </div>

            @if ($errors->any())
                <div class="alert-danger">
                    @foreach ($errors->all() as $error)
                        <div><i class="bi bi-exclamation-octagon-fill me-2"></i>{{ $error }}</div>
                    @endforeach
                </div>
            @endif

            <div class="tech-form-card p-4">
                <form action="{{ route('register') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label class="tech-label-neon small">{{ __('ui.name') }}</label>
                        <div class="input-group tech-input-group">
                            <span class="input-group-text tech-input-icon"><i class="bi bi-person-badge"></i></span>
                            <input type="text" name="name" class="form-control tech-input"
                                placeholder="CyberUser_01" value="{{ old('name') }}">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="tech-label-neon small">{{ __('ui.emailAddress') }}</label>
                        <div class="input-group tech-input-group">
                            <span class="input-group-text tech-input-icon"><i class="bi bi-envelope"></i></span>
                            <input type="email" name="email" class="form-control tech-input"
                                placeholder="user@identity.tech" value="{{ old('email') }}">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="tech-label-neon small">{{ __('ui.password') }}</label>
                        <div class="input-group tech-input-group">
                            <span class="input-group-text tech-input-icon"><i class="bi bi-shield-lock"></i></span>
                            <input type="password" name="password" class="form-control tech-input"
                                placeholder="••••••••">
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="tech-label-neon small">{{ __('ui.confirmPassword') }}</label>
                        <div class="input-group tech-input-group">
                            <span class="input-group-text tech-input-icon"><i class="bi bi-check2-circle"></i></span>
                            <input type="password" name="password_confirmation" class="form-control tech-input"
                                placeholder="••••••••">
                        </div>
                    </div>

                    <button type="submit" class="btn-cyber-large w-100 mb-3">{{ __('ui.register') }}</button>

                    <p class="text-center small text-white">
                        {{ __('ui.alreadyRegistered') }}
                        <a href="{{ route('login') }}" class="link-neon-sliding fw-bold">{{ __('ui.signIn') }}</a>
                    </p>
                </form>
            </div>

        </div>
    </div>
</x-layout>
