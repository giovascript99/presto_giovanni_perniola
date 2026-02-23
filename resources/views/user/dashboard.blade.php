<x-layout>

    <div class="container my-5">
        <div class="row">
            <div class="col-12 d-flex justify-content-between align-items-center mb-4">
                <h2>La mia Dashboard</h2>
                <a href="{{ route('article.create') }}" class="btn btn-success shadow-sm">
                    <i class="bi bi-plus-circle"></i> Nuovo Annuncio
                </a>
            </div>
        </div>

        {{-- Contatore degli stati --}}
        <div class="row g-4 mb-5">
            <div class="col-12 col-md-4">
                <div class="card shadow-sm border-0 border-start border-primary border-4 py-2">
                    <div class="card-body">
                        <h6 class="text-muted text-uppercase small font-weight-bold">Totale Annunci</h6>
                        <p class="h3 mb-0">{{ $articles->count() }}</p>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-4">
                <div class="card shadow-sm border-0 border-start border-success border-4 py-2">
                    <div class="card-body">
                        <h6 class="text-muted text-uppercase small font-weight-bold">Pubblicati</h6>
                        <p class="h3 mb-0">{{ $articles->where('is_accepted', true)->count() }}</p>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-4">
                <div class="card shadow-sm border-0 border-start border-warning border-4 py-2">
                    <div class="card-body">
                        <h6 class="text-muted text-uppercase small font-weight-bold">In Revisione</h6>
                        <p class="h3 mb-0">{{ $articles->where('is_accepted', null)->count() }}</p>
                    </div>
                </div>
            </div>
        </div>
        {{-- Fine Contatore degli stati --}}

        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif

        @if (session()->has('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <div class="row mt-4">
            <div class="col-12">
                <table class="table table-hover border">
                    <thead class="table-dark">
                        <tr>
                            <th>Immagine</th>
                            <th>Titolo</th>
                            <th>Categoria</th>
                            <th>Stato</th>
                            <th>Data</th>
                            <th class="text-end">Azioni</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($articles as $article)
                            <tr>
                                <td>
                                    <img src="{{ $article->images->first() ? Storage::url($article->images->first()->path) : 'https://picsum.photos/200' }}"
                                        alt="{{ $article->title }}"
                                        style="width: 50px; height: 50px; object-fit: cover;" class="rounded">
                                </td>
                                <td>{{ $article->title }}</td>
                                <td>{{ __('ui.' . $article->category->name) }}</td>
                                <td>
                                    @if (is_null($article->is_accepted))
                                        <span class="badge bg-warning text-dark">In Revisione</span>
                                    @elseif($article->is_accepted)
                                        <span class="badge bg-success">Pubblicato</span>
                                    @else
                                        <span class="badge bg-danger">Rifiutato</span>
                                    @endif
                                </td>
                                <td>{{ $article->created_at->format('d/m/Y') }}</td>
                                <td class="text-end">
                                    <a href="{{ route('article.edit', $article) }}"
                                        class="btn btn-sm btn-outline-primary">Modifica</a>

                                    <form action="{{ route('article.destroy', $article) }}" method="POST"
                                        class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger"
                                            onclick="return confirm('Sei sicuro di voler eliminare questo articolo?')">Elimina</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                @if ($articles->isEmpty())
                    <div class="alert alert-info text-center">
                        Non hai ancora pubblicato nessun articolo. <a href="{{ route('article.create') }}">Creane uno
                            ora!</a>
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-layout>
