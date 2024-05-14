@extends('layouts.app')

@section('title', $webData->title)
@section('heading', $webData->heading)
@section('description', $webData->description)
@section('keywords', $webData->keywords)

@section('content')
    @if (!$states->isEmpty())
        <div class="bg-white p-3">
            <div class="d-flex flex-column pb-2">
                <div class="pb-2">
                    <h6 class="fw-bold text-uppercase text-decoration-none region-link" style="color: #cd5360;"
                        href="{{ url($country->link) }}">
                        {{ $country->title }}
                    </h6>
                </div>
                <hr class="p-0 m-0 pb-2 mb-1 border-1 opacity-25">
                <div class="d-flex flex-wrap" style="gap: 5px">
                    @forelse($states as $state)
                        @if ($state->active && $state->children->isEmpty())
                            <a href="{{ url($state->link) }}" class="btn rounded-0 state-link">
                                {{ $state->title }}
                            </a>
                        @endif
                    @empty
                        <p class="text-muted pb-0 mb-0">{{ __('No available states.') }}</p>
                    @endforelse
                </div>
            </div>
            @foreach ($states as $state)
                @if ($state->active && !$state->children->isEmpty())
                    <div class="d-flex flex-column py-2">
                        <div class="pb-2">
                            <h6 class="fw-bold text-uppercase text-decoration-none region-link" style="color: #cd5360;"
                                href="{{ url($state->link) }}">
                                {{ $state->title }}
                            </h6>
                        </div>
                        <hr class="p-0 m-0 pb-2 mb-1 border-1 opacity-25">
                        <div class="d-flex flex-wrap" style="gap: 5px">
                            @forelse($state->children->sortBy('title') as $state)
                                @if ($state->active)
                                    <a href="{{ url($state->link) }}" class="btn rounded-0 state-link">
                                        {{ $state->title }}
                                    </a>
                                @endif
                            @empty
                                <p class="text-muted pb-0 mb-0">{{ __('No available states.') }}</p>
                            @endforelse
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    @endif
    <div class="bg-white px-3 py-4">
        <div class="d-flex flex-column gap-4 pb-2">
            @if ($country->flag)
                <div class="d-flex gap-3">
                    <img src="{{ asset('images/flags/' . $country->flag) }}" alt="{{ $country->flag_alt }}"
                        class="img-fluid" style="width: 180px; height: 110px; border: 1px solid #E7E7E7;">
                    <p class="mb-0 pb-0 text-muted">{{ $country->flag_info ? $country->flag_info : null }}</p>
                </div>
            @endif
            <div class="d-flex flex-column gap-3">
                @forelse ($news as $newsRecord)
                    @if ($country->flag && $loop->first)
                        <hr class="p-0 m-0 border-1 opacity-25">
                    @endif
                    @if ($newsRecord->active)
                        <div class="d-flex gap-3">
                            @if ($newsRecord->logo)
                                <img src="{{ asset('images/news_logos/' . $newsRecord->logo) }}"
                                    alt="{{ $newsRecord->logo_alt }}"
                                    style="width: 120px; height: 50px; object-fit: contain; cursor: pointer"
                                    onclick="redirectAway('{{ $newsRecord->url }}')">
                            @endif
                            <div class="d-flex flex-column">
                                <a href="{{ $newsRecord->url }}" target="_blank"
                                    class="magazine-link text-decoration-none">
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
    </div>
    @if ($country->body)
        <div class="bg-white px-3 pt-3">
            <div class="country-body">{!! $country->body !!}</div>
        </div>
    @endif

    <style>
        .state-link {
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

        .country-body p {
            color: #797979;
        }

        .news-link,
        .country-body a {
            text-decoration: none;
            color: #438496;
            transition: color 200ms ease;

            &:hover,
            &:focus {
                color: #336674;
            }
        }
    </style>
@endsection
