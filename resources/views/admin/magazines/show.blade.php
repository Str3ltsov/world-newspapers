@extends('layouts.admin')

@section('title', __('Magazine - ' . $magazine->title))

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row" style="row-gap: 8px">
                        <div class="col-xl-3 col-lg-4 col-md-6 col-12">
                            <b>{{ __('ID') }}:</b>
                            {{ $magazine->id }}
                        </div>
                        <div class="col-xl-3 col-lg-4 col-md-6 col-12">
                            <b>{{ __('Title') }}:</b>
                            {{ $magazine->title }}
                        </div>
                        <div class="col-xl-3 col-lg-4 col-md-6 col-12">
                            <b>{{ __('URL') }}:</b>
                            <a href="{{ $magazine->url }}" target="_blank">
                                {{ $magazine->url ?? '-' }}
                            </a>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-md-6 col-12">
                            <b>{{ __('Cover') }}:</b>
                            {{ $magazine->cover ?? '-' }}
                        </div>
                        <div class="col-xl-3 col-lg-4 col-md-6 col-12">
                            <b>{{ __('Cover Alt') }}:</b>
                            {{ $magazine->cover_alt ?? '-' }}
                        </div>
                        <div class="col-xl-3 col-lg-4 col-md-6 col-12">
                            <b>{{ __('Date') }}:</b>
                            {{ $magazine->date ? $magazine->date->format('Y-m-d') : '-' }}
                        </div>
                        <div class="col-xl-3 col-lg-4 col-md-6 col-12">
                            <b>{{ __('Link ID') }}:</b>
                            {{ $magazine->link_id }}
                        </div>
                        <div class="col-xl-3 col-lg-4 col-md-6 col-12">
                            <b>{{ __('Active') }}:</b>
                            {{ $magazine->active ? __('True') : __('False') }}
                        </div>
                        <div class="col-12">
                            <b>{{ __('Description') }}:</b>
                            {!! $magazine->description !!}
                        </div>
                    </div>
                </div>
                <div class="card-footer d-flex align-items-center">
                    <a href="{{ route('magazines.edit', $magazine->id) }}" class="btn btn-primary mr-2">
                        {{ __('Edit') }}
                    </a>
                    @include('admin.magazines.forms.destroy_form')
                    <span class="mx-2">|</span>
                    <a href="{{ route('magazines.index') }}" class="btn btn-secondary">
                        {{ __('Back to magazines') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
