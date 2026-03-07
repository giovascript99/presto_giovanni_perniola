<nav class="navbar navbar-expand-xxl fixed-top tech-nav">
    <div class="container-fluid">
        <a class="navbar-brand fw-bold tech-logo" href="{{ route('homepage') }}">
            CYBER<span class="text-neon">PRESTO</span>
        </a>

        <button class="navbar-toggler custom-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav mx-auto align-items-center">
                <li class="nav-item">
                    <a class="nav-link fs-6" href="{{ route('homepage') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fs-6" href="{{ route('article.index') }}">{{ __('ui.articles') }}</a>
                </li>

                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle fs-6" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        {{ __('ui.categories') }}
                    </a>
                    <ul class="dropdown-menu tech-dropdown">
                        @foreach ($categories as $category)
                            <li>
                                <a href="{{ route('byCategory', ['category' => $category]) }}"
                                    class="dropdown-item text-capitalize fs-6">
                                    {{ __('ui.' . $category->name) }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </li>

                @auth
                    @if (Auth::user()->is_revisor)
                        <li class="nav-item mx-2 mt-3 mt-md-0">
                            <a class="nav-link btn-revisor-glow position-relative fw-bold fs-6" href="{{ route('revisor.index') }}">
                                {{ __('ui.reviewerArea') }}
                                <span class="badge-tech">
                                    {{ \App\Models\Article::toBeRevisedCount() }}
                                </span>
                            </a>
                        </li>
                    @endif

                    <li class="nav-item dropdown">
                        <a class="nav-link nav-link-custom dropdown-toggle user-glow fs-6" href="#" role="button"
                            data-bs-toggle="dropdown">
                            <i class="bi bi-person-circle me-1"></i> {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu tech-dropdown">
                            <li><a class="dropdown-item fs-6"
                                    href="{{ route('article.create') }}">{{ __('ui.articleCreate') }}</a></li>
                            <li><a class="dropdown-item fs-6" href="{{ route('user.dashboard') }}">{{ __('ui.dashboard') }}</a>
                            </li>
                            <li>
                                <hr class="dropdown-divider border-secondary opacity-25">
                            </li>
                            <li>
                                <a class="dropdown-item fs-6" href="#"
                                    onclick="event.preventDefault(); document.querySelector('#form-logout').submit();">
                                    {{ __('ui.logout') }}
                                </a>
                                <form action="{{ route('logout') }}" method="POST" id="form-logout" class="d-none fs-6">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </li>
                @else
                    <li class="nav-item dropdown">
                        <a class="nav-link nav-link-custom dropdown-toggle fs-6" href="#" data-bs-toggle="dropdown">
                            {{ __('ui.login') }} / {{ __('ui.register') }}
                        </a>
                        <ul class="dropdown-menu tech-dropdown dropdown-menu-end">
                            <li><a class="dropdown-item fs-6" href="{{ route('login') }}">{{ __('ui.login') }}</a></li>
                            <li><a class="dropdown-item fs-6" href="{{ route('register') }}">{{ __('ui.register') }}</a></li>
                        </ul>
                    </li>
                @endauth
            </ul>

            <div class="row">
                <div class="col-8">
                    <form action="{{ route('article.search') }}" method="GET"
                        class="d-flex mx-lg-3 mt-3 mt-lg-0 search-tech">
                        <div class="input-group">
                            <input type="search" name="query"
                                class="form-control bg-dark border-secondary text-white"
                                placeholder="{{ __('ui.search') }}">
                            <button class="btn btn-outline-neon" type="submit">
                                <i class="bi bi-search"></i>
                            </button>
                        </div>
                    </form>
                </div>

                <div class="col-3 mx-3 small">
                    <div class="nav-item dropdown ms-lg-3 mt-3 mt-lg-0">
                        <a class="nav-link nav-link-custom dropdown-toggle border border-secondary rounded py-2 px-2"
                            href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-translate me-1"></i> {{ strtoupper(App::getLocale()) }}
                        </a>
                        <ul class="dropdown-menu tech-dropdown dropdown-menu-end">
                            <li>
                                <div class="dropdown-item p-0"><x-_locale lang="it" /></div>
                            </li>
                            <li>
                                <div class="dropdown-item p-0"><x-_locale lang="en" /></div>
                            </li>
                            <li>
                                <div class="dropdown-item p-0"><x-_locale lang="es" /></div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>
    </div>
</nav>
