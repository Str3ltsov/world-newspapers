<form method="post" action="{{ route('blogs.destroy', $blog->id) }}">
    @method('DELETE')
    @csrf
    <button type="submit" class="btn btn-danger"
        onclick="return confirm('{{ __('Are you sure you want to delete this blog?') }}')">
        {{ __('Delete') }}
    </button>
</form>
