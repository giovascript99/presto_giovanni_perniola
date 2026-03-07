<x-layout>
    <div class="container page-header">
        <div class="row">
            <div class="col-12 text-center text-md-start">
                
                <h1 class="display-4 fw-bold tech-glow-text text-uppercase mb-0">
                    {{ __('ui.searchResult') }}:
                    <span class="text-neon fst-italic">"{{ $query }}"</span>
                </h1>

                <div class="title-underline-neon ms-5 ms-md-0"></div>
            </div>
        </div>
    </div>
    <div class="container my-5">
        {{-- Griglia Articoli --}}
        <div class="row g-4 justify-content-start">
            @forelse ($articles as $article)
                <div class="col-12 col-md-6 col-lg-4 col-xl-3 d-flex align-items-stretch">
                    <x-card :article="$article" />
                </div>
            @empty
                <div class="col-12 text-center py-5 badge-dashed">
                    <div class="py-5">
                        <i class="bi bi-database-exclamation text-neon display-1 mb-4 d-block"></i>
                        <h3 class="text-white text-uppercase fw-bold">
                            {{ __('ui.articleMatch') }}
                        </h3>
                        <p class="text-secondary small mb-4">NESSUN DATO TROVATO PER LA STRINGA:
                            "{{ $query }}"</p>
                        <div class="mt-4">
                            <a href="{{ route('article.index') }}"
                                class="btn-cyber-small py-2 px-4 text-decoration-none">
                                <i class="bi bi-arrow-left me-2"></i> {{ __('ui.allArticles') }}
                            </a>
                        </div>
                    </div>
                </div>
            @endforelse
        </div>
    </div>
</x-layout>
