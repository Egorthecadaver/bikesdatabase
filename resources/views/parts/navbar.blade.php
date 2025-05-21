<nav class="navbar navbar-expand-lg navbar-dark bg-secondary mb-4">
    <div class="container">
        <a class="navbar-brand" href="{{ route('bikes.index') }}">
            <i class="fas fa-biking fa-xl me-2"></i>Велопрокат
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('bikes.index') }}">
                        <i class="fas fa-bicycle fa-lg me-2"></i> Велосипеды</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('bike_type.index') }}">Типы</a>
                </li>
                @auth
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('bikes.create') }}">
                            <i class="fas fa-plus-circle"></i>Добавить</a>
                    </li>
                @endauth
            </ul>

            @include('parts.auth')
        </div>
    </div>
</nav>
