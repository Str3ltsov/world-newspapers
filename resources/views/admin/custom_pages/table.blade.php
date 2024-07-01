<table id="dataTable" class="table data-table table-hover text-nowrap table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Path</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @forelse ($custom_pages as $custom_page)
            <tr class="@if ($loop->index % 2) odd @else even @endif">
                <td>
                    {{ $custom_page->id }}
                </td>
                <td>
                    {{ $custom_page->title }}
                </td>
                <td>
                    <a href="{{ url($custom_page->path) }}" target="_blank">
                        {{ $custom_page->path }}
                    </a>
                </td>
                <td>
                    <div class="d-flex align-items-center">
                        <a href="{{ route('custom_pages.show', $custom_page->id) }}" class="btn btn-primary mr-2">
                            {{ __('View') }}
                        </a>
                        <a href="{{ route('custom_pages.edit', $custom_page->id) }}" class="btn btn-secondary mr-2">
                            {{ __('Edit') }}
                        </a>
                        @include('admin.custom_pages.forms.destroy_form')
                    </div>
                </td>
            </tr>
        @empty
        @endforelse
    </tbody>
</table>
