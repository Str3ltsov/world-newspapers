@extends('layouts.app')

@section('content')
    <div class="bg-white px-3 py-4">
        <div class="d-flex flex-column gap-1">
            <h6 class="mb-0 pb-0" style="color: #438496;">{{ __('Error') }}</h6>
            <p class="mb-0 pb-0 text-muted">
                {{ __('The requested address was not found on this server.') }}
            </p>
        </div>
    </div>
@endsection
