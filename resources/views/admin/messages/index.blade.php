@extends('layouts.admin')

@section('title', __('Messages'))

@section('content')
    <div class="mb-4">
        @include('session_messages')
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title d-flex justify-content-between align-items-center w-100">
                        Messages
                    </h3>
                </div>
                <div class="card-body table-responsive">
                    @include('admin.messages.table')
                </div>
            </div>
        </div>
    </div>

    <style>
        div.dt-container select.dt-input {
            margin-right: 10px;
        }

        div.dt-container .dt-search input {
            margin-left: 10px;
        }
    </style>
@endsection

@push('adminScripts')
    <script>
        new DataTable('#messageDataTable', {
            order: {
                idx: 0,
                dir: 'desc'
            }
        });
    </script>
@endpush
