<table id="dataTable" class="table data-table table-hover text-nowrap table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Heading</th>
            <th>Description</th>
            <th>Keywords</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @forelse ($webData as $webDataInstance)
            <tr class="@if ($loop->index % 2) odd @else even @endif">
                <td>
                    {{ $webDataInstance->id }}
                </td>
                <td>
                    {{ $webDataInstance->title }}
                </td>
                <td>
                    {{ $webDataInstance->heading ?? '-' }}
                </td>
                <td>
                    {{ $webDataInstance->description ?? '-' }}
                </td>
                <td>
                    {{ $webDataInstance->keywords ?? '-' }}
                </td>
                <td>
                    <div class="d-flex align-items-center">
                        <a href="{{ route('web_data.show', $webDataInstance->id) }}" class="btn btn-primary mr-2">
                            {{ __('View') }}
                        </a>
                        <a href="{{ route('web_data.edit', $webDataInstance->id) }}" class="btn btn-secondary mr-2">
                            {{ __('Edit') }}
                        </a>
                        @include('admin.web_data.forms.destroy_form')
                    </div>
                </td>
            </tr>
        @empty
            <tr colspan="6">
                {{ __('No web data found') }}
            </tr>
        @endforelse
    </tbody>
</table>
