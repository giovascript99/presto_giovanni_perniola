<x-layout>
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8">
                <h1>Modifica l'articolo: {{ $article->title }}</h1>
                <hr>
                
                <livewire:edit-article-form :article="$article" />
                
            </div>
        </div>
    </div>
</x-layout>