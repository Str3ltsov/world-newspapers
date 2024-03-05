<aside class="d-flex flex-column gap-3 col-md-3 order-2 order-sm-2 order-md-1">
    <div class="bg-white p-3">
        <form class="input-group" action="" method="">
            <input type="text" class="form-control rounded-0 bg-white" placeholder="Search..." aria-label="Searchbar" aria-describedby="search-button">
            <button class="btn rounded-0 text-white" type="submit" id="search-button">
                <i class="fa-solid fa-magnifying-glass"></i>
            </button>
        </form>
    </div>
    <div class="bg-white p-3">
        <h6 class="fw-bold text-uppercase px-1 pb-1" style="color: #cd5360;">
            {{ __('Magazines') }}
        </h6>
        <hr class="p-0 m-0 my-2 pb-1 border-1 opacity-25">
        <ul class="list-unstyled px-1 pb-0 mb-0">
            @foreach($magazineLinks as $magazineLink)
                <li class="nav-link">
                    <a href="{{ url($magazineLink->link) }}" class="nav-link magazine-link p-0">
                        {{ $magazineLink->title }}
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
</aside>

<style>
    #search-button {
        background-color: #438496;

        &:hover, &:focus {
            background-color: #336674;
        }
    }

    .magazine-link {
        color: #438496;
        transition: color 200ms ease;

        &:hover, &:focus {
            color: #336674;
        }
    }
</style>