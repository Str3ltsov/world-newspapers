@extends('layouts.app')

@section('title', $webData->title)
@section('heading', $webData->heading)
@section('description', $webData->description)
@section('keywords', $webData->keywords)

@section('content')
    <div class="bg-white px-3 py-4">
        <div class="d-flex flex-column gap-1">
            <ul class="list-unstyled px-1 pb-0 mb-0">
                @foreach($regions as $region)
                    <li class="mb-2">
                        <a href="{{ url($region->link) }}" class="nav-link sitemap-link fw-bold text-uppercase">
                            <i class="fa-solid fa-caret-down me-1"></i>
                            {{ $region->title }}
                        </a>
                        <ul class="list-unstyled px-4 pb-0 mb-0" style="column-count: 2">
                            @foreach($region->children as $country)
                                <li>
                                    <a href="{{ url($country->link) }}" class="nav-link sitemap-link">
                                        <i class="fa-solid fa-caret-right me-1"></i>
                                        {{ $country->title }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </li>
                @endforeach
            </ul>
            <div class="mb-2 px-1">
                <a href="{{ url($usCountry->link) }}" class="nav-link sitemap-link fw-bold text-uppercase">
                    <i class="fa-solid fa-caret-down me-1"></i>
                    {{ $usCountry->title }}
                </a>
                <ul class="list-unstyled px-4 pb-0 mb-0" style="column-count: 2">
                    @foreach($usCountry->children as $states)
                        <li>
                            <a href="{{ url($states->link) }}" class="nav-link sitemap-link">
                                <i class="fa-solid fa-caret-right me-1"></i>
                                {{ $states->title }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="mb-2 px-1">
                <a href="{{ url($magazines->link) }}" class="nav-link sitemap-link fw-bold text-uppercase">
                    <i class="fa-solid fa-caret-down me-1"></i>
                    {{ $magazines->title }}
                </a>
                <ul class="list-unstyled px-4 pb-0 mb-0" style="column-count: 2">
                    @foreach($magazineCategories as $magazineCategory)
                        <li>
                            <a href="{{ url($magazineCategory->link) }}" class="nav-link sitemap-link">
                                <i class="fa-solid fa-caret-right me-1"></i>
                                {{ $magazineCategory->title }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="mb-2 px-1">
                <a href="{{ url($news->link) }}" class="nav-link sitemap-link fw-bold text-uppercase">
                    <i class="fa-solid fa-caret-down me-1"></i>
                    {{ explode(' ', $news->title)[0] }}
                </a>
                <ul class="list-unstyled px-4 pb-0 mb-0" style="column-count: 2">
                    @foreach($newsCategories as $newsCategory)
                        <li>
                            <a href="{{ url($newsCategory->link) }}" class="nav-link sitemap-link">
                                <i class="fa-solid fa-caret-right me-1"></i>
                                {{ $newsCategory->title }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>

    <style>
        .sitemap-link {
            color: #438496;
            transition: color 200ms ease;

            &:hover, &:focus {
                color: #336674;
            }
        }  
    </style>
@endsection
