@extends('layouts.app')

@section('title', $webData->title)
@section('description', $webData->description)
@section('keywords', $webData->keywords)

@section('content')
    {{ $webData->heading }}
@endsection
