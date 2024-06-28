@extends('layouts.admin')

@section('title', __('Edit Web Data - ' . $webDataInstance->title))

@section('content')
    <div class="mb-4">
        @include('session_messages')
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        {{ __('Edit Web Data - ' . $webDataInstance->title) }}
                    </h3>
                </div>
                @include('admin.web_data.forms.update_form')
            </div>
        </div>
    </div>
@endsection

@push('adminScripts')
    <script>
        const input = document.querySelector('input[name=keywords]');
        new Tagify(input, {});
    </script>
@endpush
