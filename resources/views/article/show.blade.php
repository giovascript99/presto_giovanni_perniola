<x-layout>
    <div class="container-fluid tech-main-section py-5" style="padding-top: 100px !important;">
        <div class="container">
            <div class="row g-5">

                {{-- COLONNA SINISTRA: VISUAL ASSETS (CAROUSEL) --}}
                <div class="col-12 col-lg-7 animate__animated animate__fadeInLeft">
                    <div class="tech-form-card overflow-hidden p-1 shadow-lg h-100">
                        <div class="card-corner-top"></div>

                        @if ($article->images->count() > 0)
                            <div id="carouselExample" class="carousel slide h-100">

                                {{-- Carousel Inner --}}
                                <div class="carousel-inner bg-obsidian-card rounded h-100">
                                    @foreach ($article->images as $key => $image)
                                        <div
                                            class="carousel-item h-100 @if ($loop->first) active @endif">
                                            <img src="{{ $image->getUrl(600, 600) }}"
                                                class="d-block w-100 object-fit-cover cyber-img-scan"
                                                style="height: 550px;" alt="{{ $article->title }}">
                                        </div>
                                    @endforeach
                                </div>

                                @if ($article->images->count() > 1)
                                    <button class="carousel-control-prev" type="button"
                                        data-bs-target="#carouselExample" data-bs-slide="prev"
                                        style="width: 10%; z-index: 5;">
                                        <span
                                            class="d-flex align-items-center justify-content-center bg-dark border border-success text-neon"
                                            style="width: 45px; height: 45px;">
                                            <i class="bi bi-chevron-left fs-4"></i>
                                        </span>
                                    </button>

                                    <button class="carousel-control-next" type="button"
                                        data-bs-target="#carouselExample" data-bs-slide="next"
                                        style="width: 10%; z-index: 5;">
                                        <span
                                            class="d-flex align-items-center justify-content-center bg-dark border border-success text-neon"
                                            style="width: 45px; height: 45px;">
                                            <i class="bi bi-chevron-right fs-4"></i>
                                        </span>
                                    </button>
                                @endif

                                {{-- Indicatori (Opzionali, molto tech) --}}
                                <div class="carousel-indicators mb-0">
                                    @foreach ($article->images as $key => $image)
                                        <button type="button" data-bs-target="#carouselExample"
                                            data-bs-slide-to="{{ $key }}"
                                            class="@if ($loop->first) active @endif bg-success"
                                            style="width: 30px; height: 2px;" aria-current="true"></button>
                                    @endforeach
                                </div>
                            </div>
                        @else
                            {{-- Fallback se non ci sono immagini --}}
                            <div class="bg-dark d-flex align-items-center justify-content-center rounded"
                                style="height: 550px;">
                                <i class="bi bi-image text-secondary display-1"></i>
                            </div>
                        @endif

                        <div class="card-corner-bottom"></div>
                    </div>
                </div>

                {{-- COLONNA DESTRA: METADATI E DESCRIZIONE --}}
                <div class="col-12 col-lg-5 ps-lg-5 animate__animated animate__fadeInRight">
                    <div class="d-flex flex-column h-100">

                        {{-- Header Articolo --}}
                        <div class="mb-4">
                            <a href="{{ route('byCategory', $article->category) }}"
                                class="text-neon text-decoration-none font-monospace small text-uppercase fw-bold mb-2 d-inline-block border-bottom border-success border-opacity-25 pb-1">
                                <i class="bi bi-terminal me-2"></i>{{ __('ui.' . $article->category->name) }}
                            </a>
                            <h2 class="fw-normal tech-glow-text text-uppercase mt-2">
                                {{ $article->title }}
                                </h1>
                                <div class="tech-stat-box p-3 bg-dark border-4 mt-3">
                                    <p class="h3 text-white fw-bold mb-0">€
                                        {{ number_format($article->price, 2, ',', '.') }}</p>
                                </div>
                        </div>

                        {{-- Descrizione --}}
                        <div class="tech-stat-box p-4 mb-4">
                            <h5
                                class="text-neon font-monospace fw-bold text-uppercase border-bottom border-success border-opacity-25 pb-2 mb-3">
                                <i class="bi bi-justify-left me-2"></i>{{ __('ui.description') }}
                            </h5>
                            <p class="mb-0 opacity-75">
                                {{ $article->description }}
                            </p>
                        </div>

                        {{-- Footer Metadati (Autore e Data) --}}
                        <div class="mt-auto border-top border-success border-opacity-25 pt-4">
                            <div
                                class="d-flex align-items-center p-3 bg-obsidian-card border border-success border-opacity-10 rounded">
                                <div class="bg-dark border border-neon rounded-circle d-flex align-items-center justify-content-center text-neon"
                                    style="width: 55px; height: 55px;">
                                    <i class="bi bi-person-bounding-box fs-4"></i>
                                </div>
                                <div class="ms-3">
                                    <p class="mb-0 text-white font-monospace small fw-bold">
                                        <span class="text-secondary">{{ __('ui.soldBy') }}:</span>
                                        {{ $article->user->name }}
                                    </p>
                                    <p class="mb-0 text-secondary x-small font-monospace">
                                        <span class="text-neon">{{ __('ui.publishedOn') }}:</span>
                                        {{ $article->created_at->format('d.m.Y') }}
                                    </p>
                                </div>
                            </div>

                            {{-- Bottone Azione Torna Indietro --}}
                            <div class="d-grid gap-2 mt-4">
                                <a href="{{ route('article.index') }}" {{-- Link corretto all'archivio --}}
                                    class="text-neon text-decoration-none font-monospace small text-uppercase fw-bold mb-2 d-inline-block border-bottom border-success border-opacity-25 pb-1">
                                    <i class="bi bi-arrow-left me-2"></i>{{ __('ui.backToArticle') }}
                                </a>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
</x-layout>
