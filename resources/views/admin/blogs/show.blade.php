@extends('layouts.admin')

@section('title', __('Blog - ' . $blog->title))

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title d-flex justify-content-between align-items-center w-100">
                        {{ __('Blog - ' . $blog->title) }}
                        <div class="d-flex align-items-center">
                            <a href="{{ route('blogs.edit', $blog->id) }}" class="btn btn-primary mr-2">
                                {{ __('Edit') }}
                            </a>
                            @include('admin.blogs.forms.destroy_form')
                        </div>
                    </h3>
                </div>
                <div class="card-body">
                    <div class="row" style="row-gap: 8px">
                        <div class="col-xl-3 col-lg-4 col-md-6 col-12">
                            <b>{{ __('ID') }}:</b>
                            {{ $blog->id }}
                        </div>
                        <div class="col-xl-3 col-lg-4 col-md-6 col-12">
                            <b>{{ __('Title') }}:</b>
                            {{ $blog->title }}
                        </div>
                        <div class="col-xl-3 col-lg-4 col-md-6 col-12">
                            <b>{{ __('Slug') }}:</b>
                            {{ $blog->slug }}
                        </div>
                        <div class="col-xl-3 col-lg-4 col-md-6 col-12">
                            <b>{{ __('Path') }}:</b>
                            <a href="{{ url($blog->path) }}" target="_blank">
                                {{ $blog->path }}
                            </a>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-md-6 col-12">
                            <b>{{ __('Date Created') }}:</b>
                            {{ $blog->created_at ? $blog->created_at->format('Y-m-d H:i:s') : '-' }}
                        </div>
                        <div class="col-xl-3 col-lg-4 col-md-6 col-12">
                            <b>{{ __('Date Updated') }}:</b>
                            {{ $blog->updated_at ? $blog->updated_at->format('Y-m-d H:i:s') : '-' }}
                        </div>
                        <div class="col-12">
                            <b>{{ __('Excerpt') }}:</b>
                            {!! $blog->excerpt ?? '-' !!}
                        </div>
                        <div class="col-12">
                            <b>{{ __('Body') }}:</b>
                            {!! $blog->body ?? '-' !!}
                        </div>
                    </div>
                </div>
                <div class="card-footer d-flex align-items-center">
                    <a href="{{ route('blogs.index') }}" class="btn btn-secondary">
                        {{ __('Back to blogs') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
