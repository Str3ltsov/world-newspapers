@extends('layouts.admin')

@section('title', __('Custom Page - ' . $custom_page->title))

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title d-flex justify-content-between align-items-center w-100">
                        {{ __('Custom Page - ' . $custom_page->title) }}
                        <div class="d-flex align-items-center">
                            <a href="{{ route('custom_pages.edit', $custom_page->id) }}" class="btn btn-primary mr-2">
                                {{ __('Edit') }}
                            </a>
                            @include('admin.custom_pages.forms.destroy_form')
                        </div>
                    </h3>
                </div>
                <div class="card-body">
                    <div class="row" style="row-gap: 8px">
                        <div class="col-xl-3 col-lg-4 col-md-6 col-12">
                            <b>{{ __('ID') }}:</b>
                            {{ $custom_page->id }}
                        </div>
                        <div class="col-xl-3 col-lg-4 col-md-6 col-12">
                            <b>{{ __('Title') }}:</b>
                            {{ $custom_page->title }}
                        </div>
                        <div class="col-xl-3 col-lg-4 col-md-6 col-12">
                            <b>{{ __('Slug') }}:</b>
                            {{ $custom_page->slug }}
                        </div>
                        <div class="col-xl-3 col-lg-4 col-md-6 col-12">
                            <b>{{ __('Path') }}:</b>
                            <a href="{{ url($custom_page->path) }}" target="_blank">
                                {{ $custom_page->path }}
                            </a>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-md-6 col-12">
                            <b>{{ __('Date Created') }}:</b>
                            {{ $custom_page->created_at ? $custom_page->created_at->format('Y-m-d H:i:s') : '-' }}
                        </div>
                        <div class="col-xl-3 col-lg-4 col-md-6 col-12">
                            <b>{{ __('Date Updated') }}:</b>
                            {{ $custom_page->updated_at ? $custom_page->updated_at->format('Y-m-d H:i:s') : '-' }}
                        </div>
                        <div class="col-12">
                            <b>{{ __('Body') }}:</b>
                            {!! $custom_page->body ?? '-' !!}
                        </div>
                    </div>
                </div>
                <div class="card-footer d-flex align-items-center">
                    <a href="{{ route('custom_pages.index') }}" class="btn btn-secondary">
                        {{ __('Back to custom pages') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
