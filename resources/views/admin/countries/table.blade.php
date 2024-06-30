<table id="dataTable" class="table data-table table-hover text-nowrap table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Link</th>
            @if (!$isAParent)
                <th>Code</th>
                <th>Flag</th>
                <th>Flag Alt</th>
            @endif
            <th>Web Data ID</th>
            <th>Order</th>
            <th>Active</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @forelse ($countries as $country)
            <tr class="@if ($loop->index % 2) odd @else even @endif">
                <td>
                    {{ $country->id }}
                </td>
                <td>
                    {{ $country->title }}
                </td>
                <td>
                    <a href="{{ url($country->link) }}" target="_blank">
                        {{ $country->link }}
                    </a>
                </td>
                @if (!$isAParent)
                    <td>
                        {{ $country->code ?? '-' }}
                    </td>
                    <td>
                        {{ $country->flag ?? '-' }}
                    </td>
                    <td>
                        {{ $country->flag_alt ?? '-' }}
                    </td>
                @endif
                <td>
                    {{ $country->web_data_id ?? '-' }}
                </td>
                <td>
                    {{ $country->left ?? '-' }}
                </td>
                <td class="text-center">
                    @if ($country->active)
                        <div class="d-none">a</div>
                        <i class="nav-icon fas text-success fa-solid fa-check"></i>
                    @else
                        <div class="d-none">a</div>
                        <i class="nav-icon fas text-danger fa-solid fa-ban"></i>
                    @endif
                </td>
                <td>
                    <div class="d-flex align-items-center">
                        <a href="{{ route('countries.show', ['country' => $country->id, 'is_a_parent' => $isAParent, 'country_type' => $countryType]) }}"
                            class="btn btn-primary mr-2">
                            {{ __('View') }}
                        </a>
                        <a href="{{ route('countries.edit', ['country' => $country->id, 'is_a_parent' => $isAParent, 'country_type' => $countryType]) }}"
                            class="btn btn-secondary mr-2">
                            {{ __('Edit') }}
                        </a>
                        @if ($deleteEnabled)
                            @include('admin.countries.forms.destroy_form')
                        @endif
                    </div>
                </td>
            </tr>
        @empty
        @endforelse
    </tbody>
</table>
