@extends('layouts.app')

@section('title', $webData->title)
@section('heading', $webData->heading)
@section('description', $webData->description)
@section('keywords', $webData->keywords)

@section('content')
    <div class="bg-white p-3">
        <div class="d-flex flex-wrap gap-2">
            @forelse($subcategories as $subcategory)
                <a href="{{ url($subcategory->link) }}" class="btn rounded-0 subcategory-link">
                    {{ $subcategory->title }}
                </a>
            @empty
                <p class="text-muted pb-0 mb-0">{{ __('No available subcategories.') }}</p>
            @endforelse
        </div>
    </div>
    <div class="bg-white px-3 py-4">
        <div class="d-flex flex-column gap-4">
            @forelse ($magazines as $magazine)
                <div class="d-flex gap-3">
                    @if ($magazine->cover)
                        <img src="{{ asset('images/magazine_covers/'.$magazine->cover) }}" alt="{{ $magazine->cover_alt }}" 
                            class="img-fluid" style="cursor: pointer" width="100px" onclick="redirectAway('{{ $magazine->url }}')">
                    @endif
                    <div class="d-flex flex-column">
                        <a href="{{ $magazine->url }}" target="_blank" class="magazine-link text-decoration-none">
                            {{ $magazine->title }}
                        </a>
                        <p class="mb-0 pb-0 text-muted">{{ $magazine->description ? $magazine->description : null }}</p>
                    </div>
                </div>
            @empty
                <p class="text-muted pb-0 mb-0">{{ __('No available magazines.') }}</p>
            @endforelse
        </div>
    </div>

    <style>  
        .subcategory-link {
            background-color: #E4E4E4;
            color: #6F6F6F;
            transition: all 200ms ease;
    
            &:hover, &:focus {
                background-color: #cd5360;
                color: #E4E4E4;
            }
        }

        .magazine-link {
            color: #438496;
            transition: color 200ms ease;

            &:hover, &:focus {
                color: #336674;
            }
        }
    </style>

    <script>
        const redirectAway = url => window.open(url, "_blank")
    </script>
@endsection
