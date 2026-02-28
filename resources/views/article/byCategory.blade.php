<x-layout>
    <div class="container-fluid page-header">
        <div class="row px-3 px-md-5 mb-5">
            <div class="col-12 col-md-8 text-center text-md-start">

                <h1 class="display-5 fw-bold tech-glow-text text-uppercase mb-0">
                    {{ __('ui.byCategory_h1') }}
                    <br>
                    <span class="text-neon">{{ __('ui.' . $category->name) }}</span>
                </h1>

                <div class="title-underline-neon mt-3 ms-5 ms-md-0"></div>
            </div>

            <div class="col-12 col-md-4 text-center text-md-end my-5 mt-md-0">
                <div class="tech-stat-box d-inline-block px-4 py-2">
                    <span class="text-neon fw-bold font-monospace fs-5">
                        {{ $articles->count() }} <span class="small opacity-75">FILES_DETECTED</span>
                    </span>
                </div>
            </div>
        </div>
    </div>

    <div class="container my-5">
        <div class="row mb-5">
            <div class="col-12">
                <a href="{{ route('article.index') }}" class="link-cyber-scanner">
                    <i class="bi bi-chevron-double-left me-2 scanner-icon"></i>
                    <span class="scanner-text text-uppercase fw-bold" style="letter-spacing: 2px;">
                        {{ __('ui.allArticles') }}
                    </span>
                    <span class="scanner-line"></span>
                </a>
            </div>
        </div>

        <div class="row justify-content-center g-4">
            @forelse ($articles as $article)
                <div class="col-12 col-md-6 col-lg-4 mb-4">
                    <x-card :article="$article" />
                </div>
            @empty
                <div class="col-12 text-center py-5">
                    <div class="badge-dashed p-5">
                        <div class="mb-4">
                            <i class="bi bi-exclamation-triangle display-1 text-neon"></i>
                        </div>
                        <h3 class="text-white text-uppercase fw-light mb-4" style="letter-spacing: 4px;">
                            {{ __('ui.noArticleByCategory') }}
                        </h3>

                        @auth
                            <a href="{{ route('article.create') }}" class="btn-cyber-large px-5">
                                <span class="btn-text">
                                    {{ __('ui.createArticle') }}</span>
                            </a>
                        @else
                            <p class="text-secondary font-monospace mt-3">Access_Denied: No_Data_Found</p>
                        @endauth
                    </div>
                </div>
            @endforelse
        </div>
    </div>
</x-layout>
