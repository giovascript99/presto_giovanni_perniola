<x-layout>
    <div class="container-fluid min-vh-100 tech-main-section py-5" style="padding-top: 100px !important;">
        <div class="container">

            <div class="row mb-5 justify-content-center">
                <div
                    class="col-12 col-md-10 d-flex justify-content-between align-items-end border-bottom border-success border-opacity-25 pb-3">
                    <div>
                        <h2 class="tech-h2 fw-bold text-uppercase mb-0 tech-glow-text">
                            {{ __('ui.editArticle') }}: <span class="text-neon">{{ $article->title }}</span>
                        </h2>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-12 col-md-10 col-lg-8">
                        <livewire:edit-article-form :article="$article" />
                </div>
            </div>
        </div>
    </div>
    </div>
</x-layout>
