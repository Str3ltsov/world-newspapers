<nav class="navbar navbar-expand-lg navbar-dark py-md-1" style="background-color: #438496;">
    <div class="container">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainMenu" aria-controls="mainMenu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="mainMenu">
            <ul class="navbar-nav gap-lg-3">
                @foreach($mainMenuLinks as $mainMenuLink)
                    @if ($mainMenuLink->link === '/')
                        <li class="nav-item main-menu-item mt-3 mt-md-0 px-1">
                            <a class="nav-link text-white text-uppercase py-1 fs-6 ms-0 ps-0" href="{{ url($mainMenuLink->link) }}">
                                <i class="fa-solid fa-house fs-5"></i>
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
        <a class="navbar-brand pt-2 px-1" href="https://www.facebook.com/WorldNewspapers.WN/">
            <i class="fa-brands fa-square-facebook fs-2"></i>
        </a>
    </div>
</nav>

<style>
    .main-menu-item {
        &:hover, &:focus {
            background: #356a78;
        }
    }
</style>