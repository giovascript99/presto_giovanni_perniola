<x-layout>
    <div class="container-fluid min-vh-100 d-flex justify-content-center mb-5 page-header border-bottom-0 pb-5">
        <div class="col-12 col-md-10 col-lg-6">

            <div class="text-center mb-5 mt-4">
                <h1 class="display-4 fw-bold text-white text-uppercase tech-glow-text mb-2">
                        {{ __('ui.createArticle') }}
                </h1>
                <div class="d-flex justify-content-center">
                    <div class="title-underline-neon"></div>
                </div>
            </div>

            <livewire:article-create-form />

        </div>
    </div>
</x-layout>