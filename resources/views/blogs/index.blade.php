@extends('layouts.app')

@section('title', $webData->title)
@section('heading', $webData->heading)
@section('description', $webData->description)
@section('keywords', $webData->keywords)

@section('content')
    <div class="bg-white px-3 py-4">
        <div class="d-flex flex-column gap-3">
            @forelse ($blogs as $blog)
                <div class="d-flex flex-column gap-1">
                    <a href="{{ url($blog->path) }}" class="blog-link text-decoration-none text-uppercase fs-5 fw-bold">
                        {{ $blog->title }}
                    </a>
                    <span style="color: #868e96; font-size: .85em">
                        {{ 'Posted on '.$blog->created_at->format('l, F d Y H:i:s') }}
                    </span>
                    <p class="mb-0 pb-0 text-muted">{{ $blog->excerpt ? $blog->excerpt : null }}</p>
                    <div class="d-flex align-items-center justify-content-end mt-1">
                        <a href="{{ url($blog->path) }}" class="btn read-button text-white">{{ __('Read') }}</a>
                    </div>
                </div>
                @if (!$loop->last)
                    <hr class="p-0 m-0 border-1 opacity-25">
                @endif
            @empty
                <p class="text-muted pb-0 mb-0">{{ __('No available blogs.') }}</p>
            @endforelse
        </div>
    </div>

    <style>
        .blog-link {
            color: #438496;
            transition: color 200ms ease;

            &:hover, &:focus {
                color: #336674;
            }
        }

        .read-button {
            background-color: #438496;

            &:hover, &:focus {
                background-color: #336674;
            }
        }
    </style>
@endsection
