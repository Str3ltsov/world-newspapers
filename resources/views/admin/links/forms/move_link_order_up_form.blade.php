<form method="post"
    action="{{ route('moveLinkOrderUp', ['link' => $link->id, 'is_a_parent' => $isAParent, 'link_type' => $link->menu_id]) }}">
    @method('PATCH')
    @csrf
    <button type="submit" class="btn btn-info ml-2">
        {{ __('Move up') }}
    </button>
</form>
