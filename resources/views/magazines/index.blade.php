@extends('layouts.app')

@section('title', $webData->title)
@section('heading', $webData->heading)
@section('description', $webData->description)
@section('keywords', $webData->keywords)

@section('content')
    @if (!$subcategories->isEmpty())
        <div class="bg-white p-3">
            <div class="d-flex flex-wrap" style="gap: 5px">
                @forelse($subcategories as $subcategory)
                    <a href="{{ url($subcategory->link) }}" 
                        class="btn rounded-0 
                            @if ($link->title == $subcategory->title) 
                                subcategory-link-active 
                            @else 
                                subcategory-link 
                            @endif
                        ">
                        {{ $subcategory->title }}
                    </a>
                @empty
                    <p class="text-muted pb-0 mb-0">{{ __('No available subcategories.') }}</p>
                @endforelse
            </div>
        </div>
    @endif
    <div class="bg-white px-3 py-4">
        <div class="d-flex flex-column gap-3">
            @forelse ($magazines as $magazine)
                @if ($magazine->active)
                    <div class="d-flex gap-3">
                        @if ($magazine->cover)
                            <img src="{{ asset('images/magazine_covers/'.$magazine->cover) }}" alt="{{ $magazine->cover_alt }}" 
                                style="width: 120px; max-height: 170px; cursor: pointer" onclick="redirectAway('{{ $magazine->url }}')">
                        @endif
                        <div class="d-flex flex-column">
                            <a href="{{ $magazine->url }}" target="_blank" class="magazine-link text-decoration-none">
                                {{ $magazine->title }}
                            </a>
                            <p class="mb-0 pb-0 text-muted">{{ $magazine->description ? $magazine->description : null }}</p>
                        </div>
                    </div>
                @endif
                @if (!$loop->last)
                    <hr class="p-0 m-0 border-1 opacity-25">
                @endif
            @empty
                <p class="text-muted pb-0 mb-0">{{ __('No available magazines.') }}</p>
            @endforelse
        </div>
    </div>
    @if ($link->body)
        <div class="bg-white px-3 pt-3">
            <div class="link-body">{!! $link->body !!}</div>
        </div>
    @endif

    <style>  
        .subcategory-link {
            background-color: #E4E4E4;
            color: #6F6F6F;
            transition: all 200ms ease;
            padding: 3px 8px;
    
            &:hover, &:focus {
                background-color: #cd5360;
                color: #F4F4F4;
            }
        }

        .subcategory-link-active {
            background-color: #cd5360;
            color: #F4F4F4;
            padding: 3px 8px;
        }

        .link-body p {
            color: #797979;
        }

        .magazine-link, .link-body a {
            color: #438496;
            transition: color 200ms ease;

            &:hover, &:focus {
                color: #336674;
            }
        }
    </style>
@endsection
