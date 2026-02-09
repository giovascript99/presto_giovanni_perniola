<x-layout>

    <div class="container-fluid text-center bg-body-tertiary">
        <div class="row justify-content-center align-items-center hero-section">
            <div class="col-12">
                <h1 class="display-4 mb-4 text-white">Presto.it</h1>
                <div class="my-3">
                    @auth
                        <a class="btn btn-primary" href="{{ route('article.create') }}">Pubblica un articolo</a>
                    @endauth
                </div>
                <div class="d-flex justify-content-center">
                    @if (session()->has('errorMessage'))
                        <div class="alert alert-danger text-center shadow rounded w-50">
                            {{ session('errorMessage') }}
                        </div>
                    @endif
                    @if (session()->has('message'))
                        <div class="alert alert-success text-center shadow rounded w-50">
                            {{ session('message') }}
                        </div>
                    @endif
                </div>
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

</x-layout>
