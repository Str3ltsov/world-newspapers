<table id="dataTable" class="table table-hover text-nowrap table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>URL</th>
            <th>Cover</th>
            <th>Cover Alt</th>
            <th>Date</th>
            <th>Link ID</th>
            <th>Active</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @forelse ($magazines as $magazine)
            <tr class="@if ($loop->index % 2) odd @else even @endif">
                <td>
                    {{ $magazine->id }}
                </td>
                <td>
                    {{ $magazine->title }}
                </td>
                <td>
                    @if ($magazine->url)
                        <a href="{{ url($magazine->url) }}" target="_blank">
                            {{ $magazine->url }}
                        </a>
                    @else
                        -
                    @endif
                </td>
                <td>
                    {{ $magazine->cover ?? '-' }}
                </td>
                <td>
                    {{ $magazine->cover_alt ?? '-' }}
                </td>
                <td>
                    {{ $magazine->date ? $magazine->date->format('Y-m-d') : '-' }}
                </td>
                <td>
                    {{ $magazine->link_id }}
                </td>
                <td class="text-center">
                    @if ($magazine->active)
                        <div class="d-none">a</div>
                        <i class="nav-icon fas text-success fa-solid fa-check"></i>
                    @else
                        <div class="d-none">a</div>
                        <i class="nav-icon fas text-danger fa-solid fa-ban"></i>
                    @endif
                </td>
                <td>
                    <div class="d-flex align-items-center">
                        <a href="{{ route('magazines.show', $magazine->id) }}" class="btn btn-primary mr-2">
                            {{ __('View') }}
                        </a>
                        <a href="{{ route('magazines.edit', $magazine->id) }}" class="btn btn-secondary mr-2">
                            {{ __('Edit') }}
                        </a>
                        @include('admin.magazines.forms.destroy_form')
                    </div>
                </td>
            </tr>
        @empty
            <tr colspan="6">
                {{ __('No magazines found') }}
            </tr>
        @endforelse
    </tbody>
</table>
