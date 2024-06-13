<nav class="navbar navbar-light bg-light d-none d-sm-block">
    <div class="container d-flex justify-content-start">
				@auth
            <a class="navbar-brand fw-normal fs-6 py-0 header-link" href="{{ url('/about-us') }}">About us</a>
            <a class="navbar-brand fw-normal fs-6 py-0 header-link" href="{{ url('/privacy-policy') }}">Privacy policy</a>
            <a class="navbar-brand fw-normal fs-6 py-0 header-link" href="{{ url('/contact') }}">Contact</a>
            <a class="navbar-brand fw-normal fs-6 py-0 header-link" href="{{ url('/sitemap-index') }}">Sitemap</a>
        @endauth

        <!-- Вывод кнопок для неавторизованных пользователей -->
        @guest
            <a class="navbar-brand fw-normal fs-6 py-0 header-link" href="{{ route('login') }}">Login</a>
            <a class="navbar-brand fw-normal fs-6 py-0 header-link" href="{{ route('register') }}">Register</a>
        @else
            <!-- Кнопка для выхода из аккаунта -->
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="btn btn-link navbar-brand fw-normal fs-6 py-0 header-link">Logout</button>
            </form>
        @endguest
    </div>
</nav>

<style>
    .header-link {
        transition: color 200ms ease;
        color: #959595;

        &:hover, &:focus {
            color: #cd5360;
        }
    }
</style>