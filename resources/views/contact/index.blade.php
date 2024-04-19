@extends('layouts.app')

@section('title', $webData->title)
@section('heading', $webData->heading)
@section('description', $webData->description)
@section('keywords', $webData->keywords)

@section('content')
    @include('success_message')
    <div class="bg-white px-3 py-4">
        @include('contact.send_message_form')
    </div>

    <style>
        .send-button {
            background-color: #438496;

            &:hover, &:focus {
                background-color: #336674;
            }
        }
    </style>
@endsection
