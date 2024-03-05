@extends('layouts.app')

@section('title', $webData->title)
@section('heading', $webData->heading)
@section('description', $webData->description)
@section('keywords', $webData->keywords)

@section('content')
    <div class="bg-white p-3">
        <p class="text-muted">
            {{ __('World newspapers, magazines, and news sites in English, sorted by country and region:') }}
        </p>
        <div class="d-flex flex-column gap-4">
            @forelse ($regions as $region)
                <div class="d-flex flex-column pb-2">
                    <div class="pb-2">
                        <a class="fw-bold text-uppercase text-decoration-none region-link" href="{{ url($region->link) }}">
                            {{ $region->title }}
                        </a>
                    </div>
                    <hr class="p-0 m-0 pb-2 mb-1 border-1 opacity-25">
                    <div class="d-flex flex-wrap gap-2">
                        @forelse($region->children as $country)
                            <a href="{{ url($country->link) }}" class="btn rounded-0 country-link">
                                {{ $country->title }}
                            </a>
                        @empty
                            <p class="text-muted">{{ __('No available countries.') }}</p>
                        @endforelse
                    </div>
                </div>
            @empty
                <p class="text-muted">{{ __('No available regions.') }}</p>
            @endforelse
        </div>
    </div>

    <style>  
        .region-link {
            color: #438496;
            transition: color 200ms ease;

            &:hover, &:focus {
                color: #336674;
            }
        }  

        .country-link {
            background-color: #E4E4E4;
            color: #6F6F6F;
            transition: all 200ms ease;
    
            &:hover, &:focus {
                background-color: #cd5360;
                color: #E4E4E4;
            }
        }
    </style>
@endsection
