@if ($message = session('success'))
    <div class="alert alert-success alert-dismissible fade show mb-0" role="alert">
        {{ $message }}
        @if (!str_contains(route('adminDashboard'), request()->path()))
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        @endif
    </div>
@endif

<script>
    const closeMessage = milliseconds => {
        const messageCloseButton = document.querySelector('.btn-close')
        messageCloseButton !== null && setTimeout(() => messageCloseButton.click(), milliseconds);
    }
    closeMessage(5000)
</script>
