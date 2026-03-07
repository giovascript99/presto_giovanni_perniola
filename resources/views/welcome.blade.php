<x-layout>
    <header class="hero-section d-flex align-items-center justify-content-center">
        <div class="container text-center">
            <div class="hero-content">

                <h1 class="display-1 fw-bold text-white mb-2 tech-glow-text">
                    CYBER<span class="text-neon">PRESTO</span>
                </h1>

                <p class="tech-subtitle mb-5">{{ __('ui.heroSubtitle') }}</p>

                <div class="d-flex justify-content-center mb-5">
                    @if (session()->has('errorMessage'))
                        <div class="alert-danger">
                            <i class="bi bi-exclamation-octagon me-2"></i> {{ session('errorMessage') }}
                        </div>
                    @endif
                    @if (session()->has('message'))
                        <div class="alert-success text-center mb-5">
                            <i class="bi bi-check2-all me-2"></i> {{ session('message') }}
                        </div>
                    @endif
                </div>

                @auth
                    <div class="hero-action-area">
                        <a href="{{ route('article.create') }}" class="btn-cyber-large">
                            <span>{{ __('ui.createArticle') }}</span>
                            <span class="btn-glitch"></span>
                            <i class="bi bi-plus-lg ms-2"></i>
                        </a>
                    </div>
                @endauth
            </div>
        </div>

        <div class="scanline"></div>
    </header>

    <main class="py-5">
        <div class="container">
            <div class="row mb-5 align-items-center">
                <div class="col-md-8 text-start">
                    <h2 class="tech-h2 fw-bold text-uppercase mb-0">
                        {{ __('ui.recentArticles') }}
                    </h2>
                    <div class="title-underline-neon"></div>
                </div>
                <div class="col-md-4 text-md-end mt-3 mt-md-0">
                    <a href="{{ route('article.index') }}" class="link-cyber-scanner">
                        <span class="scanner-text text-uppercase fw-bold">
                            {{ __('ui.allArticles') }}
                        </span>
                        <span class="scanner-line"></span>
                        <i class="bi bi-chevron-double-right ms-2 scanner-icon"></i>
                    </a>
                </div>
            </div>

            <div class="row justify-content-center g-4">
                @forelse ($articles as $article)
                    <div class="col-12 col-md-6 col-lg-4">
                        <x-card :article="$article" />
                    </div>
                @empty
                    <div class="col-12 text-center py-5">
                        <div class="badge-dashed p-5">
                            <div class="mb-3">
                                <i class="bi bi-cpu text-neon fs-1"></i>
                            </div>
                            <h3 class="text-white fw-light mb-2 text-uppercase" style="letter-spacing: 3px;">
                                {{ __('ui.noArticles') }}
                            </h3>
                            <p class="text-secondary small">System_Status: Database_Empty</p>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </main>

</x-layout>
