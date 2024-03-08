<aside class="d-flex flex-column gap-3 col-md-3 order-2 order-sm-2 order-md-1">
    <div class="bg-white p-3">
        <div class="input-group">
            <input type="text" class="form-control rounded-0 bg-white" id="search-input"
                placeholder="Search..." aria-label="Searchbar" aria-describedby="search-button">
            <button class="btn rounded-0 text-white" type="button" id="search-button">
                <i class="fa-solid fa-magnifying-glass"></i>
            </button>
        </div>
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

<script>
    const googleSearchThisWebsite = () => {
        const searchInput = document.getElementById('search-input')
        const searchButton = document.getElementById('search-button')

        searchButton.addEventListener('click', () => {
            window.open(
                `https://www.google.com/search?sitesearch=world-newspapers.com&q=${searchInput.value}`, 
                "_blank"
            )
        })

        searchInput.addEventListener('keypress', event => {
            if (event.keyCode === 13) {
                searchButton.click();
            }
        })
    }
    
    googleSearchThisWebsite()
</script>