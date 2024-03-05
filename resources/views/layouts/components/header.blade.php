<nav class="navbar navbar-light bg-light d-none d-sm-block">
    <div class="container d-flex justify-content-start">
        @foreach($headerLinks as $headerLink)
            <a class="navbar-brand fw-normal fs-6 py-0 header-link" href="{{ url($headerLink->link) }}">
                {{ $headerLink->title }}
            </a>
        @endforeach
    </div>
</nav>

<style>
    .header-link {
        color: #959595;

        &:hover, &:focus {
            color: #cd5360;
        }
    }
</style>