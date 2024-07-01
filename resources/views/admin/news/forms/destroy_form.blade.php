<form method="post" action="{{ route('news.destroy', $newsInstance->id) }}">
    @method('DELETE')
    @csrf
    <button type="submit" class="btn btn-danger"
        onclick="return confirm('{{ __('Are you sure you want to delete this news?') }}')">
        {{ __('Delete') }}
    </button>
</form>
