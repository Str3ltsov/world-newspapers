@extends('layouts.admin')

@section('title', __('Create News'))

@section('content')
    <div class="mb-4">
        @include('session_messages')
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        Create News
                    </h3>
                </div>
                @include('admin.news.forms.store_form')
            </div>
        </div>
    </div>
@endsection

@push('adminScripts')
    <script>
        const changeActiveValue = () => {
            const activeCheckbox = document.getElementById('active')
            const activeValue = document.getElementById('activeValue')

            activeCheckbox.checked ? activeValue.value = 1 : activeValue.value = 0;
        }
    </script>
@endpush
