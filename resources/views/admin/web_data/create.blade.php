@extends('layouts.admin')

@section('title', __('Create Web Data'))

@section('content')
    <div class="mb-4">
        @include('session_messages')
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        Create Web Data
                    </h3>
                </div>
                @include('admin.web_data.forms.store_form')
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
