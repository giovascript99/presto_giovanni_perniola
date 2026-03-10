<div
    class="card tech-form-card h-100 border-0 shadow-lg position-relative overflow-hidden">
    <div class="card-corner-top"></div>

    <div class="position-relative">
        <img src="{{ $article->images->isNotEmpty() ? $article->images->first()->getUrl(900, 900) : 'https://picsum.photos/400/300' }}"
            class="cyber-card-img" alt="{{ $article->title }}">
    </div>

    <div class="card-body d-flex flex-column bg-obsidian-card">
        <h5 class="card-title fw-bold text-white text-uppercase small" style="letter-spacing: 2px;">
            {{ $article->title }}
        </h5>

        <p class="card-text text-neon h4 mb-3">
            € {{ number_format($article->price, 2, ',', '.') }}
        </p>

        <div
            class="mt-auto pt-3 border-top border-secondary border-opacity-25 d-flex justify-content-around align-items-center gap-3">
            <a href="{{ route('article.show', compact('article')) }}" class="btn-cyber-small">
                <span>{{ __('ui.detail') }}</span>
            </a>

            <a href="{{ route('byCategory', $article->category) }}"
                class="link-neon-sliding small opacity-75 text-uppercase">
                #{{ __('ui.' . $article->category->name) }}
            </a>
        </div>
    </div>

    <div class="card-footer-tech"></div>
</div>
