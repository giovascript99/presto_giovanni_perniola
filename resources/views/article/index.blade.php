{{-- <x-layout>

    <div class="container-fluid">
        <div class="row height-custom justify-content-center align-items-center text-center">
            <div class="col-12">
                <h1 class="display-1">Tutti gli articoli</h1>
            </div>
        </div>
        <div class="row height-custom justify-content-center align-items-center py-5">
            @forelse ($articles as $article)
                <div class="col-12 col-md-4 my-5">
                    <x-card :article="$article" />
                </div>
            @empty
                <div class="col-12">
                    <h3 class="text-center">
                        Non sono ancora stati creati articoli
                    </h3>
                </div>
            @endforelse
        </div>
    </div>
    <div class="d-flex justify-content-center">
        <div>
            {{ $articles->links() }}
        </div>
    </div>

</x-layout> --}}

<x-layout>

    {{-- Header della pagina più compatto --}}
    <div class="container mt-5">
        <div class="row">
            <div class="col-12 text-center mb-4">
                <h1 class="display-4 fw-bold">Esplora i nostri annunci</h1>
                <p class="text-muted">Trovati {{ $articles->total() }} articoli disponibili</p>
                <hr class="w-25 mx-auto">
            </div>
        </div>
    </div>

    <div class="container my-5">
        <div class="row">
            {{-- Griglia articoli --}}
            @forelse ($articles as $article)
                <div class="col-12 col-md-6 col-lg-4 mb-4">
                    <x-card :article="$article" />
                </div>
            @empty
                <div class="col-12 text-center py-5">
                    <div class="mb-3">
                        <i class="bi bi-search display-1 text-muted"></i>
                    </div>
                    <h3 class="text-muted">Ops! Non ci sono ancora articoli in questa sezione.</h3>
                    <a href="{{ route('article.create') }}" class="btn btn-primary mt-3">Sii il primo a pubblicare!</a>
                </div>
            @endforelse
        </div>

        {{-- Paginazione stilizzata --}}
        <div class="row mt-5">
            <div class="col-12 d-flex justify-content-center pagination-custom">
                {{ $articles->links() }}
            </div>
        </div>
    </div>

</x-layout>
