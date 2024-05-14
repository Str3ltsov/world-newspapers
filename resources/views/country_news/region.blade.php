@extends('layouts.app')

@section('title', $webData->title)
@section('heading', $webData->heading)
@section('description', $webData->description)
@section('keywords', $webData->keywords)

@section('content')
    <div class="bg-white p-3">
        <div class="d-flex flex-column pb-2">
            <div class="pb-2">
                <a class="fw-bold text-uppercase text-decoration-none region-link" href="{{ url($region->link) }}">
                    {{ $region->title }}
                </a>
            </div>
            <hr class="p-0 m-0 pb-2 mb-1 border-1 opacity-25">
            <div class="d-flex flex-wrap" style="gap: 5px">
                @forelse($countries as $country)
                    @if ($country->active)
                        <a href="{{ url($country->link) }}" class="btn rounded-0 country-link">
                            {{ $country->title }}
                        </a>
                    @endif
                @empty
                    <p class="text-muted pb-0 mb-0">{{ __('No available countries.') }}</p>
                @endforelse
            </div>
        </div>
    </div>
    <div class="bg-white px-3 py-4">
        <div class="d-flex flex-column gap-3">
            @forelse ($news as $newsRecord)
                @if ($newsRecord->active)
                    <div class="d-flex gap-3">
                        @if ($newsRecord->logo)
                            <img src="{{ asset('images/news_logos/' . $newsRecord->logo) }}"
                                alt="{{ $newsRecord->logo_alt }}"
                                style="width: 120px; height: 50px; object-fit: contain; cursor: pointer cursor: pointer"
                                onclick="redirectAway('{{ $newsRecord->url }}')">
                        @endif
                        <div class="d-flex flex-column">
                            <a href="{{ $newsRecord->url }}" target="_blank" class="magazine-link text-decoration-none">
                                {{ $newsRecord->title }}
                            </a>
                            <p class="mb-0 pb-0 text-muted">
                                {{ $newsRecord->description ? $newsRecord->description : null }}
                            </p>
                        </div>
                    </div>
                @endif
                @if (!$loop->last)
                    <hr class="p-0 m-0 border-1 opacity-25">
                @endif
            @empty
                <p class="text-muted pb-0 mb-0">{{ __('No available news.') }}</p>
            @endforelse
        </div>
    </div>
    @if ($region->body)
        <div class="bg-white px-3 pt-3">
            <div class="region-body">{!! $region->body !!}</div>
        </div>
    @endif

    <style>
        .region-link,
        region-body a {
            color: #438496;
            transition: color 200ms ease;

            &:hover,
            &:focus {
                color: #336674;
            }
        }

        .region-body p {
            color: #797979;
        }

        .country-link {
            background-color: #E4E4E4;
            color: #6F6F6F;
            transition: all 200ms ease;
            padding: 3px 8px;

            &:hover,
            &:focus {
                background-color: #cd5360;
                color: #F4F4F4;
            }
        }
    </style>
@endsection
