<main class="d-flex flex-column gap-3 col-md-6 order-1 order-sm-1 order-md-2">
    <div class="bg-white p-3">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="page-breadcrumb">
            <ol class="breadcrumb" style="margin: 7px 0">
                <li class="breadcrumb-item">
                    <a href="{{ route('home') }}" class="breadcrumb-link">
                        <i class="fa-solid fa-house fs-6"></i>
                    </a>
                </li>
                @if (request()->url() != route('home') && $link->link == '/'.request()->path())
                    <li class="breadcrumb-item" aria-current="page-breadcrumb" style="color: #cd5360;">
                        {{ $link->title }}
                    </li>
                @endif
            </ol>
          </nav>
    </div>
    <div class="text-center py-2" style="background-color: #438496;">
        <h6 class="text-white text-uppercase mb-0">
            @yield('heading')
        </h6>
    </div>
    @yield('content')
</main>

<style>
    .breadcrumb-link {
        color: #438496;
        transition: color 200ms ease;

        &:hover, &:focus {
            color: #336674;
        }
    }
</style>