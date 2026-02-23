{{-- <x-layout>

    <div class="container">
        <div class="row justify-content-center align-items-center py-5 text-center">
            <div class="col-12 pt-5">
                <h1 class="display-4">{{ __('ui.byCategory_h1') }}<span
                        class="fst-italic fw-bold">{{ __('ui.' . $category->name) }}</span></h1>
            </div>
        </div>
        <div class="row height-custom justify-content-center align-items-center py-5">
            @forelse ($articles as $article)
                <div class="col-12 col-md-4 my-5">
                    <x-card :article="$article" />
                </div>
            @empty
                <div class="col-12 text-center">
                    <h3>{{ __('ui.noArticle') }}</h3>
                    @auth
                        <a href="{{ route('article.create') }}" class="btn btn-dark my-5">{{ __('ui.publishArticle') }}</a>
                    @endauth
                </div>
            @endforelse
        </div>
    </div>

</x-layout> --}}

<x-layout>
    <div class="container-fluid bg-light py-5 mb-5 shadow-sm">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12 col-md-8 text-center text-md-start">
                    <h1 class="display-5 fw-bold text-dark">
                        {{ __('ui.byCategory_h1') }}
                        <span class="text-primary text-uppercase">{{ __('ui.' . $category->name) }}</span>
                    </h1>
                    <p class="lead text-muted">Esplora tutti gli annunci nella categoria
                        {{ __('ui.' . $category->name) }}</p>
                </div>
                <div class="col-12 col-md-4 text-center text-md-end">
                    <span class="badge bg-primary fs-5 px-4 py-2">{{ $articles->count() }} Annunci</span>
                </div>
            </div>
        </div>
    </div>

    <div class="container mb-5">
        <div class="row justify-content-center">
            @forelse ($articles as $article)
                <div class="col-12 col-md-6 col-lg-4 mb-4">
                    <x-card :article="$article" />
                </div>
            @empty
                <div class="col-12 text-center py-5">
                    <div class="mb-4">
                        <i class="bi bi-tags display-1 text-muted"></i>
                    </div>
                    <h3 class="fw-light">{{ __('ui.noArticle') }}</h3>
                    @auth
                        <p class="text-muted">Vuoi essere il primo?</p>
                        <a href="{{ route('article.create') }}" class="btn btn-primary btn-lg px-5 shadow">
                            <i class="bi bi-plus-circle me-2"></i>{{ __('ui.publishArticle') }}
                        </a>
                    @endauth
                </div>
            @endforelse
        </div>
    </div>
</x-layout>
