<div class="d-flex">
    @auth
        <span class="navbar-text me-3">
            <i class="fas fa-user me-1"></i> {{ Auth::user()->name }}
        </span>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-outline-light">
                <i class="fas fa-sign-out-alt me-1"></i> Выйти
            </button>
        </form>
    @else
        <a href="{{ route('login') }}" class="btn btn-outline-light">
            <i class="fas fa-sign-in-alt me-1"></i> Войти
        </a>
    @endauth
</div>
