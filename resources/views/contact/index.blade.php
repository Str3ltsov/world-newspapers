@extends('layouts.app')

@section('title', $webData->title)
@section('heading', $webData->heading)
@section('description', $webData->description)
@section('keywords', $webData->keywords)

@section('content')
    <div class="bg-white px-3 py-4">
        <form class="row gap-3" action="" method="">
            <div class="col-12 d-flex flex-md-row flex-column">
                <label for="name" class="form-label col-sm-2 text-muted">
                    {{ __('Your name') }}
                </label>
                <input type="text" class="form-control bg-white rounded-0" id="name" name="name">
            </div>
            <div class="col-12 d-flex flex-md-row flex-column">
                <label for="email" class="form-label col-sm-2 text-muted">
                    {{ __('Your email') }}
                </label>
                <input type="email" class="form-control bg-white rounded-0" id="email" name="email">
            </div>
            <div class="col-12 d-flex flex-md-row flex-column">
                <label for="subject" class="form-label col-sm-2 text-muted">
                    {{ __('Your email') }}
                </label>
                <input type="text" class="form-control bg-white rounded-0" id="subject" name="subject">
            </div>
            <div class="col-12 d-flex flex-md-row flex-column">
                <label for="message" class="form-label col-sm-2 text-muted">
                    {{ __('Message') }}
                </label>
                <textarea class="form-control bg-white rounded-0" id="message" name="message" rows="5"></textarea>
            </div>
            <div class="col-12 d-flex mt-1">
                <div class="col-sm-2"></div>
                <button type="submit" class="btn send-button text-white">
                    {{ __('Send') }}
                </button>
            </div>
        </form>
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
