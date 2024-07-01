<form method="post" action="{{ route('markAsRead', $message->id) }}">
    @method('PATCH')
    @csrf
    <button type="submit" class="btn btn-secondary mr-2">
        {{ __('Mark as Read') }}
    </button>
</form>
