<nav class="navbar navbar-expand-lg navbar-dark py-md-1" style="background-color: #438496;">
    <div class="container">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainMenu" aria-controls="mainMenu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="mainMenu">
            <ul class="navbar-nav gap-lg-3">
                @foreach($mainMenuLinks as $mainMenuLink)
                    @if ($mainMenuLink->link === '/')
                        <li class="nav-item main-menu-item d-flex align-items-center mt-3 mt-md-0 px-1">
                            <a class="nav-link text-white text-uppercase py-1 fs-6 ms-0" href="{{ url($mainMenuLink->link) }}">
                                <i class="fa-solid fa-house fs-6 d-none d-md-block"></i>
                                <span class="d-md-none d-block">{{ $mainMenuLink->title }}</span>
                            </a>
                        </li>
                    @else
                        <li class="nav-item main-menu-item px-1">
                            <a class="nav-link text-white text-uppercase py-1 fs-6" href="{{ url($mainMenuLink->link) }}">
                                {{ $mainMenuLink->title }}
                            </a>
                        </li>
                    @endif
                @endforeach
            </ul>
        </div>
        <a class="navbar-brand pt-2 px-1 me-0" href="https://www.facebook.com/WorldNewspapers.WN/" target="_blank">
            <i class="fa-brands fa-square-facebook fs-3"></i>
        </a>
    </div>
</nav>

<style>
    .main-menu-item {
        transition: background 200ms ease;

        &:hover, &:focus {
            background: #356a78;
        }
    }
</style>