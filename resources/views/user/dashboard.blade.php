<x-layout>
    <div class="container page-header">
        <div class="row">
            <div class="col-12 col-md-8 text-center text-md-start">
                <div>

                    <h1 class="display-4 fw-bold tech-glow-text text-uppercase mb-0">
                        {{ __('ui.myDashboard') }}
                    </h1>

                </div>
                <div class="title-underline-neon mt-3 ms-5 ms-md-0"></div>
            </div>

            <div class="col-12 col-md-4 text-center text-md-end mt-5 mt-md-0">
                <a href="{{ route('article.create') }}" class="btn-cyber-large py-2 px-4 text-decoration-none">
                    <i class="bi bi-plus-lg me-2"></i> {{ __('ui.newArticle') }}
                </a>
            </div>
        </div>
    </div>

    <div class="container my-5">
        {{-- Contatori Rapidi --}}
        <div class="row mb-5 d-flex justify-content-around gap-4">
            @php
                $stats = [
                    [
                        'label' => __('ui.totalArticles'),
                        'val' => $articles->count(),
                        'class' => 'text-white',
                    ],
                    [
                        'label' => __('ui.published'),
                        'val' => $articles->where('is_accepted', true)->count(),
                        'class' => 'text-white',
                    ],
                    [
                        'label' => __('ui.underReview'),
                        'val' => $articles->whereStrict('is_accepted', null)->count(),
                        'class' => 'text-white',
                    ],
                ];
            @endphp
            @foreach ($stats as $stat)
                <div class="col-12 col-sm-3 text-center">
                    <div class="tech-stat-box p-4 border border-success border-opacity-25 h-100">
                        <h6 class="text-neon text-uppercase small fw-bold mb-2">{{ $stat['label'] }}</h6>
                        <p class="display-5 mb-0 fw-bold {{ $stat['class'] }}">{{ $stat['val'] }}
                        </p>
                    </div>
                </div>
            @endforeach
        </div>

        {{-- Tabella --}}
        <div class="tech-table-wrapper shadow-lg overflow-hidden">
            <div class="table-responsive">
                <table class="table tech-dark-table align-middle mb-0">
                    <thead>
                        <tr>
                            <th class="ps-4">{{ __('ui.image') }}</th>
                            <th>{{ __('ui.title') }}</th>
                            <th class="d-none d-md-table-cell">{{ __('ui.category') }}</th>
                            <th>{{ __('ui.status') }}</th>
                            <th class="text-end pe-4">{{ __('ui.actions') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($articles as $article)
                            <tr class="tech-row">
                                <td class="ps-4">
                                    <div class="img-thumb-cyber-table"
                                        style="background-image: url('{{ $article->images->first() ? $article->images->first()->getUrl(600, 600) : 'https://picsum.photos/200' }}')">
                                    </div>
                                </td>
                                <td>
                                    <div class="text-white fw-bold text-truncate" style="max-width: 120px;">
                                        {{ $article->title }}</div>
                                </td>
                                <td class="d-none d-md-table-cell">
                                    <span class="text-neon small">#{{ $article->category->name }}</span>
                                </td>
                                <td>
                                    @php
                                        $statusClass = is_null($article->is_accepted)
                                            ? 'b-warn'
                                            : ($article->is_accepted
                                                ? 'b-ok'
                                                : 'b-err');
                                        $statusText = is_null($article->is_accepted)
                                            ? __('ui.underReview')
                                            : ($article->is_accepted
                                                ? __('ui.publishedSingular')
                                                : __('ui.rejected'));
                                    @endphp
                                    <span class="badge-status-cyber {{ $statusClass }}">{{ $statusText }}</span>
                                </td>
                                <td class="text-end pe-4">
                                    <div class="d-flex justify-content-end gap-2 gap-md-3">
                                        <a href="{{ route('article.edit', $article) }}" class="action-link-cyber">
                                            <i class="bi bi-pencil-square fs-5"></i>
                                        </a>
                                        <form action="{{ route('article.destroy', $article) }}" method="POST"
                                            class="d-inline">
                                            @csrf @method('DELETE')
                                            <button type="submit" class="action-link-cyber del-link"
                                                onclick="return confirm('ERASE DATA?')">
                                                <i class="bi bi-trash3 fs-5"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="py-5 text-center">
                                    <div class="py-4">
                                        <i class="bi bi-database-exclamation text-neon display-3 mb-3 d-block"></i>
                                        <h4 class="text-white text-uppercase mb-4">No_Data_Found</h4>
                                        <a href="{{ route('article.create') }}" class="btn-cyber-large py-2 px-4">
                                            <i class="bi bi-plus-circle me-2"></i>{{ __('ui.createArticleFirst') }}
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-layout>
