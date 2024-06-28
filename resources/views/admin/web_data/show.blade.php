@extends('layouts.admin')

@section('title', __('Web Data - ' . $webDataInstance->title))

@section('content')
    <div class="mb-4">
        @include('session_messages')
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title d-flex justify-content-between align-items-center w-100">
                        {{ __('Web Data - ' . $webDataInstance->title) }}
                        <div class="d-flex align-items-center">
                            <a href="{{ route('web_data.edit', $webDataInstance->id) }}" class="btn btn-primary mr-2">
                                {{ __('Edit') }}
                            </a>
                            @include('admin.web_data.forms.destroy_form')
                        </div>
                    </h3>
                </div>
                <div class="card-body">
                    <div class="row" style="row-gap: 8px">
                        <div class="col-xl-3 col-lg-4 col-md-6 col-12">
                            <b>{{ __('ID') }}:</b>
                            {{ $webDataInstance->id }}
                        </div>
                        <div class="col-xl-3 col-lg-4 col-md-6 col-12">
                            <b>{{ __('Title') }}:</b>
                            {{ $webDataInstance->title }}
                        </div>
                        <div class="col-xl-3 col-lg-4 col-md-6 col-12">
                            <b>{{ __('Heading') }}:</b>
                            {{ $webDataInstance->heading ?? '-' }}
                        </div>
                        <div class="col-xl-3 col-lg-4 col-md-6 col-12">
                            <b>{{ __('Description') }}:</b>
                            {{ $webDataInstance->description ?? '-' }}
                        </div>
                        <div class="col-xl-3 col-lg-4 col-md-6 col-12">
                            <b>{{ __('Keywords') }}:</b>
                            {{ $webDataInstance->keywords ?? '-' }}
                        </div>
                    </div>
                </div>
                <div class="card-footer d-flex align-items-center">
                    <a href="{{ route('web_data.index') }}" class="btn btn-secondary">
                        {{ __('Back to web data') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
