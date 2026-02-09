<x-layout>

    <div class="container">
        <div class="row justify-content-center align-items-center py-5 text-center">
            <div class="col-12 pt-5">
                <h1 class="display-4">Articoli della categoria <span
                        class="fst-italic fw-bold">{{ $category->name }}</span></h1>
            </div>
        </div>
        <div class="row height-custom justify-content-center align-items-center py-5">
            @forelse ($articles as $article)
                <div class="col-12 col-md-4 my-5">
                    <x-card :article="$article" />
                </div>
            @empty
                <div class="col-12 text-center">
                    <h3>
                        Non sono ancora stati creati articoli per questa categoria!
                    </h3>
                    @auth
                        <a href="{{ route('article.create') }}" class="btn btn-dark my-5">Pubblica un articolo</a>
                    @endauth
                </div>
            @endforelse
        </div>
    </div>

</x-layout>
