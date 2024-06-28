<form method="post" action="{{ route('web_data.destroy', $webDataInstance->id) }}">
    @method('DELETE')
    @csrf
    <button type="submit" class="btn btn-danger"
        onclick="return confirm('{{ __('Are you sure you want to delete this web data?') }}')">
        {{ __('Delete') }}
    </button>
</form>
