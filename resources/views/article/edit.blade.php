<x-layout>
    <div class="container-fluid  min-vh-100 d-flex justify-content-center mb-5 page-header border-bottom-0 pb-5">
        <div class="col-12 col-md-10 col-lg-6">

            <div class="text-center mb-5 mt-4">
                <h2 class="display-4 fw-bold text-white text-uppercase tech-glow-text mb-2">
                    {{ __('ui.editArticle') }}: <span class="text-neon">{{ $article->title }}</span>
                </h1>
            </div>

            <div class="row justify-content-center">
                <div class="col-12 col-md-10">
                    <livewire:edit-article-form :article="$article" />
                </div>
            </div>
        </div>
    </div>
    </div>
</x-layout>
