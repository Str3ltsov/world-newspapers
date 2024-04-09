@extends('layouts.app')

@section('title', $webData->title)
@section('heading', $webData->heading)
@section('description', $webData->description)
@section('keywords', $webData->keywords)

@section('content')
    <div class="bg-white p-3">
        <div class="d-flex flex-column gap-4">
            @if (!$parentNews->isEmpty())
                <div class="d-flex flex-column pb-2">
                    <div class="pb-2">
                        <h6 class="fw-bold text-uppercase text-decoration-none subcategory-link" style="color: #cd5360;">
                            {{ $link->title }}
                        </h6>
                    </div>
                    <hr class="p-0 m-0 pb-2 mb-1 border-1 opacity-25">
                    <ul class="ps-3 pe-1 pb-0 mb-0">
                        @foreach($parentNews as $newsRecord)
                            <li class="text-muted">
                                <a href="{{ $newsRecord->url }}" target="_blank" class="news-link p-0">
                                    {{ $newsRecord->title }}
                                </a>
                                {{ $newsRecord->description ? '- '.$newsRecord->description : null }}
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @forelse ($subcategories as $subcategory)
                <div class="d-flex flex-column pb-2">
                    <div class="pb-2">
                        <h6 class="fw-bold text-uppercase text-decoration-none subcategory-link" style="color: #cd5360;">
                            {{ $subcategory->title }}
                        </h6>
                    </div>
                    <hr class="p-0 m-0 pb-2 mb-1 border-1 opacity-25">
                    <ul class="ps-3 pe-1 pb-0 mb-0">
                        @forelse($news as $newsRecord)
                            @if ($newsRecord->active && $subcategory->id === $newsRecord->link_id)
                                <li class="text-muted">
                                    <a href="{{ $newsRecord->url }}" target="_blank" class="news-link p-0">
                                        {{ $newsRecord->title }}
                                    </a>
                                    {{ $newsRecord->description ? '- '.$newsRecord->description : null }}
                                </li>
                            @endif
                        @empty
                            <p class="text-muted pb-0 mb-0">{{ __('No available news.') }}</p>
                        @endforelse
                    </ul>
                </div>
            @empty
                @if ($parentNews->isEmpty())
                    <p class="text-muted pb-0 mb-0">{{ __('No available news categories.') }}</p>
                @endif
            @endforelse
        </div>
    </div>
    @if ($link->body)
        <div class="bg-white px-3 pt-3">
            <div class="link-body">{!! $link->body !!}</div>
        </div>
    @endif

    <style>
        .link-body p {
            color: #797979;
        }

        .subcategory-link, .news-link, .link-body a {
            text-decoration: none;
            color: #438496;
            transition: color 200ms ease;

            &:hover, &:focus {
                color: #336674;
            }
        }
    </style>
@endsection
