@extends('layouts.admin')

@section('title', __('News - ' . $newsInstance->title))

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title d-flex justify-content-between align-items-center w-100">
                        {{ __('News - ' . $newsInstance->title) }}
                        <div class="d-flex align-items-center">
                            <a href="{{ route('news.edit', ['news' => $newsInstance->id, 'news_type' => $newsType]) }}"
                                class="btn btn-primary mr-2">
                                {{ __('Edit') }}
                            </a>
                            @include('admin.news.forms.destroy_form')
                        </div>
                    </h3>
                </div>
                <div class="card-body">
                    <div class="row" style="row-gap: 8px">
                        <div class="col-xl-3 col-lg-4 col-md-6 col-12">
                            <b>{{ __('ID') }}:</b>
                            {{ $newsInstance->id }}
                        </div>
                        <div class="col-xl-3 col-lg-4 col-md-6 col-12">
                            <b>{{ __('Title') }}:</b>
                            {{ $newsInstance->title }}
                        </div>
                        <div class="col-xl-3 col-lg-4 col-md-6 col-12">
                            <b>{{ __('URL') }}:</b>
                            <a href="{{ $newsInstance->url }}" target="_blank">
                                {{ $newsInstance->url ?? '-' }}
                            </a>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-md-6 col-12">
                            <b>{{ __('Logo') }}:</b>
                            {{ $newsInstance->logo ?? '-' }}
                        </div>
                        <div class="col-xl-3 col-lg-4 col-md-6 col-12">
                            <b>{{ __('Logo Alt') }}:</b>
                            {{ $newsInstance->logo_alt ?? '-' }}
                        </div>
                        @if ($newsType == 1)
                            <div class="col-xl-3 col-lg-4 col-md-6 col-12">
                                <b>{{ __('Link ID') }}:</b>
                                {{ $newsInstance->link_id ?? '-' }}
                            </div>
                        @endif
                        @if ($newsType == 2)
                            <div class="col-xl-3 col-lg-4 col-md-6 col-12">
                                <b>{{ __('Country ID') }}:</b>
                                {{ $newsInstance->country_id ?? '-' }}
                            </div>
                        @endif
                        <div class="col-xl-3 col-lg-4 col-md-6 col-12">
                            <b>{{ __('Date') }}:</b>
                            {!! $newsInstance->date ? $newsInstance->date->format('Y-m-d') : '-' !!}
                        </div>
                        <div class="col-xl-3 col-lg-4 col-md-6 col-12">
                            <b>{{ __('Active') }}:</b>
                            {{ $newsInstance->active ? __('True') : __('False') }}
                        </div>
                        <div class="col-xl-3 col-lg-4 col-md-6 col-12">
                            <b>{{ __('Date Created') }}:</b>
                            {{ $newsInstance->created_at ? $newsInstance->created_at->format('Y-m-d H:i:s') : '-' }}
                        </div>
                        <div class="col-xl-3 col-lg-4 col-md-6 col-12">
                            <b>{{ __('Date Updated') }}:</b>
                            {{ $newsInstance->updated_at ? $newsInstance->updated_at->format('Y-m-d H:i:s') : '-' }}
                        </div>
                        <div class="col-12">
                            <b>{{ __('Description') }}:</b>
                            {!! $newsInstance->description ?? '-' !!}
                        </div>
                    </div>
                </div>
                <div class="card-footer d-flex align-items-center">
                    <a href="{{ route('news.index') }}" class="btn btn-secondary">
                        {{ __('Back to news') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
