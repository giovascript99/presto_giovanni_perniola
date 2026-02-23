{{-- <x-layout>

    <div class="container-fluid">
        <div class="row height-custom justify-content-center align-items-center text-center">
            <div class="col-12">
                <h1 class="display-4">Dettaglio dell'articolo {{ $article->title }}</h1>
            </div>
        </div>
        <div class="row height-custom justify-content-center align-items-center py-5">
            <div class="col-12 col-md-6 mb-3">
                @if ($article->images->count() > 0)
                    <div id="carouselExample" class="carousel slide">
                        <div class="carousel-inner">
                            @foreach ($article->images as $key => $image)
                                <div class="carousel-item @if ($loop->first) active @endif">
                                    <img src="{{ $image->getUrl(300, 300) }}" class="d-block w-100 rounded shadow"
                                        alt="Immagine {{ $key + 1 }} dell'articolo {{ $article->title }}">
                                </div>
                            @endforeach
                        </div>
                        @if ($article->images->count() > 1)
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample"
                                data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExample"
                                data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        @endif
                    </div>
                @else
                    <img src="https://picsum.photos/600" class="m-5 w-100 rounded shadow"
                        alt="Nessuna foto inserita dall'utente">
                @endif
            </div>
            <div class="col-12 col-md-6 mb-3 height-custom text-center">
                <h2 class="display-5"> <span class="fw-bold">Titolo: </span> {{ $article->title }}</h2>
                <div class="d-flex flex-column justify-content-center h-75">
                    <h4 class="fw-bold">Prezzo: {{ $article->price }}</h4>
                    <h5>Descrizione</h5>
                    <p>{{ $article->description }}</p>
                </div>
            </div>
        </div>
    </div>

</x-layout> --}}

<x-layout>
    <div class="container py-5">
        <div class="row">
            {{-- Colonna Sinistra: Immagini --}}
            <div class="col-12 col-lg-7 mb-4">
                @if ($article->images->count() > 0)
                    <div id="carouselExample" class="carousel slide shadow rounded-4 overflow-hidden">
                        <div class="carousel-inner">
                            @foreach ($article->images as $key => $image)
                                <div class="carousel-item @if ($loop->first) active @endif">
                                    <img src="{{ $image->getUrl(300, 300) }}" class="d-block w-100 object-fit-cover"
                                        style="height: 500px;" alt="Immagine {{ $key + 1 }} dell'articolo {{ $article->title }}">
                                </div>
                            @endforeach
                        </div>
                        @if ($article->images->count() > 1)
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample"
                                data-bs-slide="prev">
                                <span class="bi bi-arrow-left p-3 rounded-circle bg-dark"
                                    aria-hidden="true"></span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExample"
                                data-bs-slide="next">
                                <span class="bi bi-arrow-right p-3 rounded-circle bg-dark"
                                    aria-hidden="true"></span>
                            </button>
                        @endif
                    </div>
                @else
                    <img src="https://picsum.photos/600/400" class="w-100 rounded-4 shadow" alt="Default image">
                @endif
            </div>

            {{-- Colonna Destra: Dettagli --}}
            <div class="col-12 col-lg-5 ps-lg-5">
                <div class="d-flex flex-column h-100">
                    <div>
                        <a href="{{ route('byCategory', $article->category) }}"
                            class="text-primary text-decoration-none fw-bold text-uppercase mb-2 d-block">
                            {{ $article->category->name }}
                        </a>
                        <h1 class="display-5 fw-bold mb-3">{{ $article->title }}</h1>
                        <p class="h2 text-success fw-bold mb-4">€ {{ number_format($article->price, 2, ',', '.') }}</p>

                        <div class="bg-light p-4 rounded-3 mb-4">
                            <h5 class="fw-bold border-bottom pb-2">Descrizione</h5>
                            <p class="mt-3 text-muted">{{ $article->description }}</p>
                        </div>
                    </div>

                    <div class="mt-auto border-top pt-4">
                        <div class="d-flex align-items-center mb-3">
                            <div class="bg-secondary rounded-circle d-flex align-items-center justify-content-center text-white"
                                style="width: 50px; height: 50px;">
                                <i class="bi bi-person-fill fs-4"></i>
                            </div>
                            <div class="ms-3">
                                <p class="mb-0 fw-bold">Venduto da: {{ $article->user->name }}</p>
                                <p class="mb-0 text-muted small">Pubblicato il:
                                    {{ $article->created_at->format('d/m/Y') }}</p>
                            </div>
                        </div>
                        <a href="mailto:{{ $article->user->email }}" class="btn btn-dark w-100 py-3 shadow-sm">
                            <i class="bi bi-envelope me-2"></i> Contatta il venditore
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
