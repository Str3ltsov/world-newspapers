@extends('layouts.app')

@section('title', $webData->title)
@section('heading', $webData->heading)
@section('description', $webData->description)
@section('keywords', $webData->keywords)

@section('content')
    <div class="bg-white px-3 py-4">
        <div class="d-flex flex-column gap-4">
            <div class="d-flex flex-column">
                <h1 class="fs-4 text-uppercase fw-bold" style="color: #438496;">
                    {{ $blog->title }}
                </h1>
                <span style="color: #868e96; font-size: .85em">
                    {{ 'Posted on '.$blog->created_at->format('l, F d Y H:i:s') }}
                </span>
            </div>
            <div class="blog-body">
                {!! $blog->body !!}
            </div>
        </div>
    </div>

    <style>
        .blog-body {
            h1, h2, h3, h4, h5, h6 {
                color: #438496;
            }

            h1, h2 {
                text-transform: uppercase;
                font-weight: bold;
                padding-top: 5px;
                font-size: 1.1em;
            }

            h3 {
                padding-top: 5px;
                font-size: 1em;
            }

            p {
                color: #797979;
            }

            a {
                text-decoration: none;
                color: #438496;
                transition: color 200ms ease;

                &:hover, &:focus {
                    color: #336674;
                }
            }
        }
    </style>
@endsection
