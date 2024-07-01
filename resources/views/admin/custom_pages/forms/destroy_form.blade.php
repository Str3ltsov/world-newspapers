<form method="post" action="{{ route('custom_pages.destroy', $custom_page->id) }}">
    @method('DELETE')
    @csrf
    <button type="submit" class="btn btn-danger"
        onclick="return confirm('{{ __('Are you sure you want to delete this custom page?') }}')">
        {{ __('Delete') }}
    </button>
</form>
