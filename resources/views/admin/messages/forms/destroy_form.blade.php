<form method="post" action="{{ route('messages.destroy', $message->id) }}">
    @method('DELETE')
    @csrf
    <button type="submit" class="btn btn-danger"
        onclick="return confirm('{{ __('Are you sure you want to delete this message?') }}')">
        {{ __('Delete') }}
    </button>
</form>
