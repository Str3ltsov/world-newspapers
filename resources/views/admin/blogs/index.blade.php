@extends('layouts.admin')

@section('title', __('Blogs'))

@section('content')
    <div class="mb-4">
        @include('session_messages')
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title d-flex justify-content-between align-items-center w-100">
                        Blogs
                        <a href="{{ route('blogs.create') }}" class="btn btn-primary">
                            {{ __('Create') }}
                        </a>
                    </h3>
                </div>
                <div class="card-body table-responsive">
                    @include('admin.blogs.table')
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
