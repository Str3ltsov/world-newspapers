@extends('layouts.admin')

@section('title', __('Countries'))

@section('content')
    <div class="mb-4">
        @include('session_messages')
    </div>
    <div class="row">
        <div class="col-xl-6 col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title d-flex justify-content-between align-items-center w-100">
                        Regions
                    </h3>
                </div>
                <div class="card-body table-responsive">
                    @include('admin.countries.table', [
                        'countries' => $regions,
                        'isAParent' => true,
                        'deleteEnabled' => false,
                        'countryType' => 1,
                    ])
                </div>
            </div>
        </div>
        <div class="col-xl-6 col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title d-flex justify-content-between align-items-center w-100">
                        Countries
                        <a href="{{ route('countries.create', ['country_type' => 2]) }}" class="btn btn-primary">
                            {{ __('Create') }}
                        </a>
                    </h3>
                </div>
                <div class="card-body table-responsive">
                    @include('admin.countries.table', [
                        'countries' => $countries,
                        'isAParent' => false,
                        'deleteEnabled' => true,
                        'countryType' => 2,
                    ])
                </div>
            </div>
        </div>
        <div class="col-xl-6 col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title d-flex justify-content-between align-items-center w-100">
                        States in USA
                        <a href="{{ route('countries.create', ['country_type' => 3]) }}" class="btn btn-primary">
                            {{ __('Create') }}
                        </a>
                    </h3>
                </div>
                <div class="card-body table-responsive">
                    @include('admin.countries.table', [
                        'countries' => $states,
                        'isAParent' => false,
                        'deleteEnabled' => true,
                        'countryType' => 3,
                    ])
                </div>
            </div>
        </div>
        <div class="col-xl-6 col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title d-flex justify-content-between align-items-center w-100">
                        Countries in UK
                        <a href="{{ route('countries.create', ['country_type' => 4]) }}" class="btn btn-primary">
                            {{ __('Create') }}
                        </a>
                    </h3>
                </div>
                <div class="card-body table-responsive">
                    @include('admin.countries.table', [
                        'countries' => $ukCountries,
                        'isAParent' => false,
                        'deleteEnabled' => true,
                        'countryType' => 4,
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
