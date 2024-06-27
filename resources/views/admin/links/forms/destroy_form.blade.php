<form method="post" action="{{ route('links.destroy', $link->id) }}">
    @method('DELETE')
    @csrf
    <button type="submit" class="btn btn-danger"
        onclick="return confirm('{{ __('Are you sure you want to delete this link?') }}')">
        {{ __('Delete') }}
    </button>
</form>
