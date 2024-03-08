<aside class="d-flex flex-column gap-3 col-md-3 order-3 order-sm-3 order-md-3">
    <div class="bg-white p-3">
        <h6 class="fw-bold text-uppercase px-1 pb-1" style="color: #cd5360;">
            {{ __('News') }}
        </h6>
        <hr class="p-0 m-0 my-2 pb-1 border-1 opacity-25">
        <ul class="list-unstyled px-1 pb-0 mb-0">
            @foreach($newsLinks as $newsLink)
                <li class="nav-link">
                    <a href="{{ url($newsLink->link) }}" class="nav-link news-link p-0">
                        {{ $newsLink->title }}
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
</aside>

<style>
    .news-link {
        color: #438496;
        transition: color 200ms ease;

        &:hover, &:focus {
            color: #336674;
        }
    }
</style>