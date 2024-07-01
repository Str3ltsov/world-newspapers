<table id="messageDataTable" class="table table-hover text-nowrap table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Subject</th>
            <th>Status</th>
            <th>Date</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @forelse ($messages as $message)
            <tr class="@if ($loop->index % 2) odd @else even @endif">
                <td style="@if ($message->status == \App\Enums\MessageStatuses::READ) opacity: calc(100% / 3) @endif">
                    {{ $message->id }}
                </td>
                <td style="@if ($message->status == \App\Enums\MessageStatuses::READ) opacity: calc(100% / 3) @endif">
                    {{ $message->name }}
                </td>
                <td style="@if ($message->status == \App\Enums\MessageStatuses::READ) opacity: calc(100% / 3) @endif">
                    {{ $message->email }}
                </td>
                <td style="@if ($message->status == \App\Enums\MessageStatuses::READ) opacity: calc(100% / 3) @endif">
                    {{ $message->title ?? '-' }}
                </td>
                <td style="@if ($message->status == \App\Enums\MessageStatuses::READ) opacity: calc(100% / 3) @endif">
                    {{ $message->status == \App\Enums\MessageStatuses::READ ? __('Read') : __('Unread') }}
                </td>
                <td style="@if ($message->status == \App\Enums\MessageStatuses::READ) opacity: calc(100% / 3) @endif">
                    {{ $message->created_at ? $message->created_at->format('Y-m-d H:i') : '-' }}
                </td>
                <td>
                    <div class="d-flex align-items-center">
                        <a href="{{ route('messages.show', $message->id) }}" class="btn btn-primary mr-2">
                            {{ __('View') }}
                        </a>
                        @if ($message->status == \App\Enums\MessageStatuses::UNREAD)
                            @include('admin.messages.forms.mark_as_read_form')
                        @endif
                        @include('admin.messages.forms.destroy_form')
                    </div>
                </td>
            </tr>
        @empty
        @endforelse
    </tbody>
</table>
