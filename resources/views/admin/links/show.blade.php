@extends('layouts.admin')

@section('title', __('Link - ' . $link->title))

@section('content')
    <div class="mb-4">
        @include('session_messages')
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title d-flex justify-content-between align-items-center w-100">
                        {{ __('Link - ' . $link->title) }}
                        <div class="d-flex align-items-center">
                            <a href="{{ route('links.edit', ['link' => $link->id, 'is_a_parent' => $isAParent, 'link_type' => $linkType]) }}"
                                class="btn btn-primary mr-2">
                                {{ __('Edit') }}
                            </a>
                            @include('admin.links.forms.destroy_form')
                        </div>
                    </h3>
                </div>
                <div class="card-body">
                    <div class="row" style="row-gap: 8px">
                        <div class="col-xl-3 col-lg-4 col-md-6 col-12">
                            <b>{{ __('ID') }}:</b>
                            {{ $link->id }}
                        </div>
                        <div class="col-xl-3 col-lg-4 col-md-6 col-12">
                            <b>{{ __('Title') }}:</b>
                            {{ $link->title }}
                        </div>
                        <div class="col-xl-3 col-lg-4 col-md-6 col-12">
                            <b>{{ __('Class') }}:</b>
                            {{ $link->class ?? '-' }}
                        </div>
                        <div class="col-xl-3 col-lg-4 col-md-6 col-12">
                            <b>{{ __('Link') }}:</b>
                            <a href="{{ url($link->link) }}" target="_blank">
                                {{ url($link->link) }}
                            </a>
                        </div>
                        @if ($link->parent_id)
                            <div class="col-xl-3 col-lg-4 col-md-6 col-12">
                                <b>{{ __('Parent ID') }}:</b>
                                {{ $link->parent_id ?? '-' }}
                            </div>
                        @endif
                        <div class="col-xl-3 col-lg-4 col-md-6 col-12">
                            <b>{{ __('Menu ID') }}:</b>
                            {{ $link->menu_id }}
                        </div>
                        <div class="col-xl-3 col-lg-4 col-md-6 col-12">
                            <b>{{ __('Web Data ID') }}:</b>
                            {{ $link->web_data_id ?? '-' }}
                        </div>
                        <div class="col-xl-3 col-lg-4 col-md-6 col-12">
                            <b>{{ __('Order') }}:</b>
                            {{ $link->left ?? '-' }}
                        </div>
                        <div class="col-12">
                            <b>{{ __('Description') }}:</b>
                            {!! $link->description ?? '-' !!}
                        </div>
                        <div class="col-12">
                            <b>{{ __('Body') }}:</b>
                            {!! $link->body ?? '-' !!}
                        </div>
                    </div>
                </div>
                <div class="card-footer d-flex align-items-center">
                    <a href="{{ route('links.index') }}" class="btn btn-secondary">
                        {{ __('Back to links') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
