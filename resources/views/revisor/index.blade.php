<x-layout>
    <div class="container page-header">
        <div class="row">
            <div class="col-12 col-md-8 text-center text-md-start">

                <h1 class="display-4 fw-bold tech-glow-text text-uppercase mb-0">
                    {{ __('ui.revisorDashboard') }}
                </h1>

                <div class="title-underline-neon ms-5 ms-md-0"></div>
            </div>
        </div>
    </div>
    {{-- Messaggi di Sistema --}}
    @if (session()->has('acceptedMessage'))
        <div class="row justify-content-center pt-4">
            <div class="col-12 col-md-6 alert-success">
                <i class="bi bi-check2-all me-2"></i> {{ session('acceptedMessage') }}
            </div>
        </div>
    @endif
    @if (session()->has('rejectedMessage'))
        <div class="row justify-content-center pt-4">
            <div class="col-12 col-md-6 alert-danger">
                <i class="bi bi-file-earmark-excel me-2"></i> {{ session('rejectedMessage') }}
            </div>
        </div>
    @endif
    <div class="container my-5">
        @if ($article_to_check)
            <div class="row g-4">
                {{-- AREA ANALISI IMMAGINI (Sinistra) --}}
                <div class="col-lg-8">
                    @forelse ($article_to_check->images as $key => $image)
                        <div class="card tech-form-card mb-4 overflow-hidden"
                            style="animation-delay: {{ $key * 0.1 }}s">
                            <div class="card-header bg-dark border-bottom border-success border-opacity-25 py-3">
                                <span class="text-neon text-uppercase">{{__('ui.image')}}: #{{ $key + 1 }}</span>
                            </div>
                            <div class="card-body bg-obsidian-card p-4">
                                <div class="row align-items-center">
                                    {{-- Immagine con bordo tecnico --}}
                                    <div class="col-md-4 text-center position-relative mb-3 mb-md-0">
                                        <div class="p-1 border border-success border-opacity-25 bg-dark">
                                            <img src="{{ $image->getUrl(600, 600) }}" class="img-fluid shadow-lg"
                                                alt="Entity {{ $key + 1 }}">
                                        </div>
                                    </div>

                                    {{-- AI Labels --}}
                                    <div class="col-md-4 border-start border-success border-opacity-10">
                                        <h6 class="text-white text-uppercase small fw-bold mb-3">
                                            <i class="bi bi-tags text-neon me-2"></i>AI_Labels
                                        </h6>
                                        <div class="d-flex flex-wrap gap-2">
                                            @if ($image->labels)
                                                @foreach ($image->labels as $label)
                                                    <span class="text-white opacity-50 py-1 px-2">#{{ $label }}</span>
                                                @endforeach
                                            @else
                                                <p class="text-secondary small">NO_DATA_EXTRACTED</p>
                                            @endif
                                        </div>
                                    </div>

                                    {{-- Safety Check --}}
                                    <div class="col-md-4 border-start border-success border-opacity-10">
                                        <h6 class="text-white text-uppercase small fw-bold mb-3">
                                            <i class="bi bi-shield-check text-neon me-2"></i>Safety_Rep
                                        </h6>
                                        <div class="safety-grid">
                                            @php
                                                $checks = [
                                                    'Adult' => $image->adult,
                                                    'Violence' => $image->violence,
                                                    'Spoof' => $image->spoof,
                                                    'Racy' => $image->racy,
                                                    'Medical' => $image->medical,
                                                ];
                                            @endphp
                                            @foreach ($checks as $label => $class)
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <p class="text-secondary">{{ $label }}</p>
                                                    <div class="safety-indicator {{ $class }}"
                                                        title="{{ $class }}"></div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="alert-cyber text-center py-4">
                            <i class="bi bi-exclamation-triangle me-2"></i> {{ __('ui.noImage') }}
                        </div>
                    @endforelse
                </div>

                {{-- SCHEDA DATI ARTICOLO (Destra) --}}
                <div class="col-lg-4">
                    <div class="card tech-form-card sticky-top shadow-lg" style="top: 110px;">
                        <div class="card-body bg-obsidian-card p-4">
                            <h2
                                class="h4 fw-bold text-white text-uppercase mb-4 tech-glow-text border-bottom border-success border-opacity-10 pb-2">
                                {{ $article_to_check->title }}
                            </h2>

                            <div class="mb-4">
                                <div class="mb-3 text-start">
                                    <p class="mb-0 text-neon small text-uppercase">
                                        {{ __('ui.author') }}</p>
                                    <p class="text-white fw-bold bg-dark p-2  small">
                                        {{ $article_to_check->user->name }}
                                    </p>
                                </div>
                                <div class="mb-3 text-start">
                                    <p class="mb-0 text-neon small text-uppercase">
                                        {{ __('ui.price') }}</p>
                                    <p class="h4 text-white fw-bold bg-dark p-2 ">
                                        € {{ number_format($article_to_check->price, 2, ',', '.') }}
                                    </p>
                                </div>
                                <div class="text-start">
                                    <p class="mb-0 text-neon small text-uppercase">
                                        {{ __('ui.description') }}</p>
                                    <div class="bg-dark p-3  mt-1">
                                        <p class="text-secondary small mb-0"
                                            style="max-height: 150px; overflow-y: auto;">
                                            {{ $article_to_check->description }}
                                        </p>
                                    </div>
                                </div>
                            </div>

                            {{-- Bottoni Azione --}}
                            <div class="d-grid gap-3">
                                <form action="{{ route('accept', ['article' => $article_to_check]) }}" method="POST">
                                    @csrf @method('PATCH')
                                    <button class="btn-cyber-accept w-100 py-3 text-uppercase fw-bold">
                                        <i class="bi bi-check2-circle me-2"></i>{{ __('ui.accept') }}
                                    </button>
                                </form>
                                <form action="{{ route('reject', ['article' => $article_to_check]) }}" method="POST">
                                    @csrf @method('PATCH')
                                    <button class="btn-cyber-reject w-100 py-3 text-uppercase fw-bold">
                                        <i class="bi bi-slash-circle me-2"></i>{{ __('ui.refuse') }}
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @else
            {{-- Schermata Empty State --}}
            <div class="text-center py-5 mt-5">
                <div class="badge-dashed p-5">
                    <i class="bi bi-terminal-check display-1 text-neon mb-4"></i>
                    <h2 class="display-6 text-white text-uppercase fw-normal tech-h2">{{ __('ui.greatJob') }}</h2>
                    <p class="text-secondary lead mb-4">{{ __('ui.noReview') }}</p>
                    <a href="{{ route('homepage') }}" class="btn-cyber-large">
                        <i class="bi bi-house-door me-2"></i>{{ __('ui.backToHome') }}
                    </a>
                </div>
            </div>
        @endif
    </div>
</x-layout>
