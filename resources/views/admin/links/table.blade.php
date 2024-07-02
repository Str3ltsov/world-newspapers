<table id="" class="table data-table table-hover text-nowrap table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Link</th>
            <th>Web Data ID</th>
            <th>Order</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @forelse ($links as $link)
            <tr class="@if ($loop->index % 2) odd @else even @endif">
                <td>
                    {{ $link->id }}
                </td>
                <td>
                    {{ $link->title }}
                </td>
                <td>
                    <a href="{{ url($link->link) }}" target="_blank">
                        {{ $link->link }}
                    </a>
                </td>
                <td>
                    {{ $link->web_data_id ?? '-' }}
                </td>
                <td>
                    {{ $link->left ?? '-' }}
                </td>
                <td>
                    <div class="d-flex align-items-center">
                        <a href="{{ route('links.show', ['link' => $link->id, 'is_a_parent' => $isAParent, 'link_type' => $link->menu_id]) }}"
                            class="btn btn-primary mr-2">
                            {{ __('View') }}
                        </a>
                        <a href="{{ route('links.edit', ['link' => $link->id, 'is_a_parent' => $isAParent, 'link_type' => $link->menu_id]) }}"
                            class="btn btn-secondary mr-2">
                            {{ __('Edit') }}
                        </a>
                        @if ($deleteEnabled)
                            @include('admin.links.forms.destroy_form')
                        @endif
                        @if (json_decode($link->params, true)['canMoveOrderUp'])
                            @include('admin.links.forms.move_link_order_up_form')
                        @endif
                        @if (json_decode($link->params, true)['canMoveOrderDown'])
                            @include('admin.links.forms.move_link_order_down_form')
                        @endif
                    </div>
                </td>
            </tr>
        @empty
            <tr colspan="6">
                {{ __('No links found') }}
            </tr>
        @endforelse
    </tbody>
</table>
