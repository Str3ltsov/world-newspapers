@extends('layouts.admin')

@section('title', __('Message - ' . $message->title))

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title d-flex justify-content-between align-items-center w-100">
                        {{ __('Message - ' . $message->title) }}
                        <div class="d-flex align-items-center">
                            @if ($message->status == \App\Enums\MessageStatuses::UNREAD)
                                @include('admin.messages.forms.mark_as_read_form')
                            @endif
                            @include('admin.messages.forms.destroy_form')
                        </div>
                    </h3>
                </div>
                <div class="card-body">
                    <div class="row" style="row-gap: 8px">
                        <div class="col-xl-3 col-lg-4 col-md-6 col-12">
                            <b>{{ __('ID') }}:</b>
                            {{ $message->id }}
                        </div>
                        <div class="col-xl-3 col-lg-4 col-md-6 col-12">
                            <b>{{ __('Name') }}:</b>
                            {{ $message->name }}
                        </div>
                        <div class="col-xl-3 col-lg-4 col-md-6 col-12">
                            <b>{{ __('Email') }}:</b>
                            {{ $message->email }}
                        </div>
                        <div class="col-xl-3 col-lg-4 col-md-6 col-12">
                            <b>{{ __('Subject') }}:</b>
                            {{ $message->title ?? '-' }}
                        </div>
                        <div class="col-xl-3 col-lg-4 col-md-6 col-12">
                            <b>{{ __('Status') }}:</b>
                            {{ $message->status == \App\Enums\MessageStatuses::READ ? __('Read') : __('Unread') }}
                        </div>
                        <div class="col-xl-3 col-lg-4 col-md-6 col-12">
                            <b>{{ __('Date') }}:</b>
                            {{ $message->created_at ? $message->created_at->format('Y-m-d H:i') : '-' }}
                        </div>
                        <div class="col-12">
                            <b>{{ __('Message') }}:</b>
                            {!! $message->body ?? '-' !!}
                        </div>
                    </div>
                </div>
                <div class="card-footer d-flex align-items-center">
                    <a href="{{ route('messages.index') }}" class="btn btn-secondary">
                        {{ __('Back to messages') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
