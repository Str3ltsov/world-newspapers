<main class="d-flex flex-column gap-3 col-md-6 order-1 order-sm-1 order-md-2 mb-3">
    <div class="bg-white p-3">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="page-breadcrumb">
            <ol class="breadcrumb" style="margin: 7px 0">
                <li class="breadcrumb-item">
                    <a href="{{ route('home') }}" class="breadcrumb-link">
                        <i class="fa-solid fa-house fs-6"></i>
                    </a>
                </li>
                @forelse ($linkBreadcrumb as $link)
                    @if (!$loop->last)
                        <li class="breadcrumb-item">
                            <a href="{{ url($link['path']) }}" class="breadcrumb-link text-decoration-none">
                                {{ $link['title'] }}
                            </a>
                        </li>
                    @else
                        <li class="breadcrumb-item" aria-current="page-breadcrumb" style="color: #cd5360;">
                            {{ $link['title'] }}
                        </li>
                    @endif
                @empty
                @endforelse
            </ol>
          </nav>
    </div>
    @hasSection('heading')
        <div class="text-center py-2" style="background-color: #438496;">
            <h6 class="text-white text-uppercase mb-0">
                @yield('heading')
            </h6>
        </div>
    @endif
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