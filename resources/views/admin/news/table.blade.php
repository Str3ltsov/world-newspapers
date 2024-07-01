<table id="dataTable" class="table data-table table-hover text-nowrap table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>URL</th>
            @if ($newsType === 2)
                <th>Logo</th>
                <th>Logo Alt</th>
            @endif
            @if ($newsType === 1)
                <th>Link ID</th>
            @endif
            @if ($newsType === 2)
                <th>Country ID</th>
            @endif
            <th>Date</th>
            <th>Active</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @forelse ($news as $newsInstance)
            <tr class="@if ($loop->index % 2) odd @else even @endif">
                <td>
                    {{ $newsInstance->id }}
                </td>
                <td>
                    {{ $newsInstance->title }}
                </td>
                <td>
                    <a href="{{ $newsInstance->url }}" target="_blank">
                        {{ $newsInstance->url }}
                    </a>
                </td>
                @if ($newsType === 2)
                    <td>
                        {{ $newsInstance->logo ?? '-' }}
                    </td>
                    <td>
                        {{ $newsInstance->logo_alt ?? '-' }}
                    </td>
                @endif
                @if ($newsType === 1)
                    <td>
                        {{ $newsInstance->link_id ?? '-' }}
                    </td>
                @endif
                @if ($newsType === 2)
                    <td>
                        {{ $newsInstance->country_id ?? '-' }}
                    </td>
                @endif
                <td>
                    {{ $newsInstance->date ? $newsInstance->date->format('Y-m-d') : '-' }}
                </td>
                <td class="text-center">
                    @if ($newsInstance->active)
                        <div class="d-none">a</div>
                        <i class="nav-icon fas text-success fa-solid fa-check"></i>
                    @else
                        <div class="d-none">a</div>
                        <i class="nav-icon fas text-danger fa-solid fa-ban"></i>
                    @endif
                </td>
                <td>
                    <div class="d-flex align-items-center">
                        <a href="{{ route('news.show', ['news' => $newsInstance->id, 'news_type' => $newsType]) }}"
                            class="btn btn-primary mr-2">
                            {{ __('View') }}
                        </a>
                        <a href="{{ route('news.edit', ['news' => $newsInstance->id, 'news_type' => $newsType]) }}"
                            class="btn btn-secondary mr-2">
                            {{ __('Edit') }}
                        </a>
                        @include('admin.news.forms.destroy_form')
                    </div>
                </td>
            </tr>
        @empty
        @endforelse
    </tbody>
</table>
