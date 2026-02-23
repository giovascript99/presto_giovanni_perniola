{{-- <div class="card mx-auto card-w shadow text-center mb-3">
    <img src="{{ $article->images->isNotEmpty() ? $article->images->first()->getUrl(300, 300) : 'https://picsum.photos/200' }}"
        class="card-img-top" alt="Immagine dell'articolo {{ $article->title }}">
    <div class="card-body">
        <h5 class="card-title">{{ $article->title }}</h5>
        <h6 class="card-subtitle mb-2 text-body-secondary">€ {{ $article->price }}</h6>
        <div class="d-flex justify-content-evenly align-items-center mt-5">
            <a href="{{ route('article.show', compact('article')) }}"
                class="btn btn-primary me-3">{{ __('ui.detail') }}</a>
            <a href="{{ route('byCategory', $article->category) }}"
                class="btn btn-outline-info">{{ __('ui.' . $article->category->name) }}</a>
        </div>
    </div>
</div> --}}
<div class="card h-100 border-0 shadow-sm custom-card">
    <div class="position-relative">
        <img src="{{ $article->images->isNotEmpty() ? $article->images->first()->getUrl(300, 300) : 'https://picsum.photos/400/300' }}"
            class="card-img-top rounded-top" alt="...">
        {{-- Badge della categoria sopra l'immagine --}}
        <span class="position-absolute top-0 end-0 m-2 badge rounded-pill bg-dark opacity-75">
            {{ __('ui.' . $article->category->name) }}
        </span>
    </div>

    <div class="card-body d-flex flex-column">
        <h5 class="card-title fw-bold">{{ $article->title }}</h5>
        <p class="card-text text-primary fw-bold h4">€ {{ number_format($article->price, 2, ',', '.') }}</p>

        <div class="mt-auto pt-3 border-top d-flex justify-content-between">
            <a href="{{ route('article.show', compact('article')) }}" class="btn btn-primary btn-sm px-4">
                {{ __('ui.detail') }}
            </a>
            <a href="{{ route('byCategory', $article->category) }}"
                class="text-decoration-none text-muted small align-self-center">
                #{{ $article->category->name }}
            </a>
        </div>
    </div>
</div>
