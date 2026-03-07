<x-layout>
    <div class="container page-header">
        <div class="row">
            <div class="col-12 col-md-8 text-center text-sm-start">

                <h1 class="display-4 fw-bold tech-glow-text text-uppercase mb-0">
                    {{ __('ui.exploreArticle') }}
                </h1>

                <div class="title-underline-neon mt-3 ms-5 ms-md-0"></div>
            </div>
            <div class="col-12 col-md-4 text-center text-md-end my-5 mt-md-0">
                <div class="tech-stat-box d-inline-block px-4 py-2 position-relative">
                    <span class="text-neon fw-bold fs-5">
                        {{ $articles->total() }}
                        <span class="small opacity-75">FILES_DETECTED</span>
                    </span>
                </div>
            </div>
        </div>
    </div>

    <div class="container my-5">
        
        <div class="row g-4">
            {{-- Griglia articoli --}}
            @forelse ($articles as $article)
                <div class="col-12 col-md-6 col-lg-4 mb-4">
                    <x-card :article="$article" />
                </div>
            @empty
                <div class="col-12 text-center py-5">
                    <div class="badge-dashed p-5">
                        <div class="mb-4">
                            <i class="bi bi-terminal-x display-1 text-neon"></i>
                        </div>
                        <h3 class="text-white text-uppercase fw-light mb-4" style="letter-spacing: 4px;">
                            {{ __('ui.noArticlesIndex') }}
                        </h3>
                        <a href="{{ route('article.create') }}" class="btn-cyber-large text-decoration-none">
                            <span>{{ __('ui.createArticle') }}</span>
                        </a>
                        <p class="text-secondary mt-4 small">Error_Code: NULL_DATA_RETURNED</p>
                    </div>
                </div>
            @endforelse
        </div>

        {{-- Pagination: Coerente con i toni scuri --}}
        <div class="row mt-5">
            <div class="col-12 d-flex justify-content-center pagination-cyber">
                {{ $articles->links() }}
            </div>
        </div>
    </div>
</x-layout>
