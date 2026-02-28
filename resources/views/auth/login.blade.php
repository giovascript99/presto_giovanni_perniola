<x-layout>
    <div class="container-fluid min-vh-100 d-flex align-items-center justify-content-center">
        <div class="col-12 col-md-6 col-lg-4">

            <div class="text-center mb-4">
                <h1 class="display-4 fw-bold text-white tech-glow-text text-uppercase">{{ __('ui.signIn') }}</h1>
                <p class="tech-subtitle-small">AUTH_PROTOCOL_ACTIVE</p>
            </div>

            @if ($errors->any())
                <div class="alert-danger">
                    @foreach ($errors->all() as $error)
                        <div><i class="bi bi-exclamation-octagon-fill me-2"></i>{{ $error }}</div>
                    @endforeach
                </div>
            @endif

            <div class="tech-form-card p-4">
                <form action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="tech-label-neon small">{{ __('ui.emailAddress') }}</label>
                        <div class="input-group tech-input-group">
                            <span class="input-group-text tech-input-icon"><i class="bi bi-person"></i></span>
                            <input type="email" name="email" class="form-control tech-input"
                                placeholder="user@identity.tech" value="{{ old('email') }}">
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="tech-label-neon small">{{ __('ui.password') }}</label>
                        <div class="input-group tech-input-group">
                            <span class="input-group-text tech-input-icon"><i class="bi bi-key"></i></span>
                            <input type="password" name="password" class="form-control tech-input"
                                placeholder="••••••••">
                        </div>
                    </div>

                    <button type="submit" class="btn-cyber-large w-100 mb-3">{{ __('ui.signIn') }}</button>

                    <p class="text-center small text-white-50">
                        {{ __('ui.notRegistered') }}
                        <a href="{{ route('register') }}" class="link-neon-sliding fw-bold">{{ __('ui.signUp') }}</a>
                    </p>
                </form>
            </div>

        </div>
    </div>
</x-layout>
