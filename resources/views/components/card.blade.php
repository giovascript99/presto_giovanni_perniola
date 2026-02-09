<div class="card mx-auto card-w shadow text-center mb-3">
    <img src="https://picsum.photos/200" class="card-img-top img-fluid" alt="Immagine dell'articolo {{ $article->title }}">
    <div class="card-body">
        <h5 class="card-title">{{ $article->title }}</h5>
        <h6 class="card-subtitle mb-2 text-body-secondary">{{ $article->price }}</h6>
        <div class="d-flex justify-content-evenly align-items-center mt-5">
            <a href="{{ route('article.show', compact('article')) }}" class="btn btn-primary me-3">Dettaglio</a>
            <a href="{{ route('byCategory', $article->category) }}"
                class="btn btn-outline-info">{{ $article->category->name }}</a>
        </div>
    </div>
</div>
