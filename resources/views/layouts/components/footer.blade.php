<footer style="background-color: #438496; margin-top: auto;">
    <div class="container">
        <p class="text-white fw-bold pt-4 pb-2">
            {{ __('World-Newspapers.com © 2002-2024 All rights reserved') }}
        </p>
    </div>
    <hr class="p-0 m-0 border-1 opacity-100" style="color: #4f9bb0;">
    <div class="container">
        <div class="d-flex align-items-center justify-content-between py-3">
            <ul class="nav gap-4">
                @foreach($headerLinks as $headerLink)
                    <li class="nav-item">
                        <a href="{{ url($headerLink->link) }}" class="nav-link footer-link p-0">
                            {{ $headerLink->title }}
                        </a>
                    </li>
                @endforeach
            </ul>
            <button type="button" class="btn rounded-0 text-white top-button fs-5" onclick="backToTop()">
                <i class="fa-solid fa-angle-up"></i>
            </button>
        </div>
    </div>
</footer>

<style>
    .footer-link {
        color: #fff;

        &:hover, &:focus {
            color: #cd5360;
        }
    }

    .top-button {
        background-color: #cd5360;

        &:hover, &:focus {
            background-color: #ac454f;
        }
    }
</style>

<script>
    const backToTop = () => {
        document.body.scrollTop = 0
        document.documentElement.scrollTop = 0
    }
</script>