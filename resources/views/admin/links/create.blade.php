@extends('layouts.admin')

@section('title', __('Create Link'))

@section('content')
    <div class="mb-4">
        @include('session_messages')
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        Create Link
                    </h3>
                </div>
                @include('admin.links.forms.store_form')
            </div>
        </div>
    </div>
@endsection

@push('adminScripts')
    <script>
        ClassicEditor
            .create(document.querySelector('#description_editor'), {})
            .catch(error => console.error(error));
        ClassicEditor
            .create(document.querySelector('#body_editor'), {})
            .catch(error => console.error(error));
    </script>
@endpush
