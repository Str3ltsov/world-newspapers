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
        @forelse ($blogs as $blog)
            <tr class="@if ($loop->index % 2) odd @else even @endif">
                <td>
                    {{ $blog->id }}
                </td>
                <td>
                    {{ $blog->title }}
                </td>
                <td>
                    <a href="{{ url($blog->path) }}" target="_blank">
                        {{ $blog->path }}
                    </a>
                </td>
                <td>
                    <div class="d-flex align-items-center">
                        <a href="{{ route('blogs.show', $blog->id) }}" class="btn btn-primary mr-2">
                            {{ __('View') }}
                        </a>
                        <a href="{{ route('blogs.edit', $blog->id) }}" class="btn btn-secondary mr-2">
                            {{ __('Edit') }}
                        </a>
                        @include('admin.blogs.forms.destroy_form')
                    </div>
                </td>
            </tr>
        @empty
        @endforelse
    </tbody>
</table>
