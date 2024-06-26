<form method="post" action="{{ route('magazines.destroy', $magazine->id) }}">
    @method('DELETE')
    @csrf
    <button type="submit" class="btn btn-danger"
        onclick="return confirm('{{ __('Are you sure you want to delete this magazine?') }}')">
        {{ __('Delete') }}
    </button>
</form>
