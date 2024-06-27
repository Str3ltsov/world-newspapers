@extends('layouts.admin')

@section('title', __('Links'))

@section('content')
    <div class="mb-4">
        @include('session_messages')
    </div>
    <div class="row">
        <div class="col-xl-6 col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title d-flex justify-content-between align-items-center w-100">
                        Magazine Links
                        <a href="{{ route('links.create', ['is_a_parent' => true, 'link_type' => 1]) }}"
                            class="btn btn-primary">
                            {{ __('Create') }}
                        </a>
                    </h3>
                </div>
                <div class="card-body table-responsive">
                    @include('admin.links.table', [
                        'links' => $magazineLinks,
                        'deleteEnabled' => true,
                        'isAParent' => true,
                    ])
                </div>
            </div>
        </div>
        <div class="col-xl-6 col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title d-flex justify-content-between align-items-center w-100">
                        Magazine Sublinks
                        <a href="{{ route('links.create', ['is_a_parent' => false, 'link_type' => 1]) }}"
                            class="btn btn-primary">
                            {{ __('Create') }}
                        </a>
                    </h3>
                </div>
                <div class="card-body table-responsive">
                    @include('admin.links.table', [
                        'links' => $magazineSublinks,
                        'deleteEnabled' => true,
                        'isAParent' => false,
                    ])
                </div>
            </div>
        </div>
        <div class="col-xl-6 col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title d-flex justify-content-between align-items-center w-100">
                        News Links
                        <a href="{{ route('links.create', ['is_a_parent' => true, 'link_type' => 2]) }}"
                            class="btn btn-primary">
                            {{ __('Create') }}
                        </a>
                    </h3>
                </div>
                <div class="card-body table-responsive">
                    @include('admin.links.table', [
                        'links' => $newsLinks,
                        'deleteEnabled' => true,
                        'isAParent' => true,
                    ])
                </div>
            </div>
        </div>
        <div class="col-xl-6 col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title d-flex justify-content-between align-items-center w-100">
                        News Sublinks
                        <a href="{{ route('links.create', ['is_a_parent' => false, 'link_type' => 2]) }}"
                            class="btn btn-primary">
                            {{ __('Create') }}
                        </a>
                    </h3>
                </div>
                <div class="card-body table-responsive">
                    @include('admin.links.table', [
                        'links' => $newsSublinks,
                        'deleteEnabled' => true,
                        'isAParent' => false,
                    ])
                </div>
            </div>
        </div>
        <div class="col-xl-6 col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        Main Menu Links
                    </h3>
                </div>
                <div class="card-body table-responsive">
                    @include('admin.links.table', [
                        'links' => $mainMenuLinks,
                        'deleteEnabled' => false,
                        'isAParent' => true,
                    ])
                </div>
            </div>
        </div>
        <div class="col-xl-6 col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        Header Links
                    </h3>
                </div>
                <div class="card-body table-responsive">
                    @include('admin.links.table', [
                        'links' => $headerLinks,
                        'deleteEnabled' => false,
                        'isAParent' => true,
                    ])
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
