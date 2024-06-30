<form method="post" action="{{ route('countries.destroy', $country->id) }}">
    @method('DELETE')
    @csrf
    <button type="submit" class="btn btn-danger"
        onclick="return confirm('{{ __('Are you sure you want to delete this country?') }}')">
        {{ __('Delete') }}
    </button>
</form>
