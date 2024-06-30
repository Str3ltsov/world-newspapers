@extends('layouts.admin')

@section('title', __('Country - ' . $country->title))

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title d-flex justify-content-between align-items-center w-100">
                        {{ __('Country - ' . $country->title) }}
                        <div class="d-flex align-items-center">
                            <a href="{{ route('countries.edit', ['country' => $country->id, 'is_a_parent' => $isAParent, 'country_type' => $countryType]) }}"
                                class="btn btn-primary mr-2">
                                {{ __('Edit') }}
                            </a>
                            @include('admin.countries.forms.destroy_form')
                        </div>
                    </h3>
                </div>
                <div class="card-body">
                    <div class="row" style="row-gap: 8px">
                        <div class="col-xl-3 col-lg-4 col-md-6 col-12">
                            <b>{{ __('ID') }}:</b>
                            {{ $country->id }}
                        </div>
                        <div class="col-xl-3 col-lg-4 col-md-6 col-12">
                            <b>{{ __('Title') }}:</b>
                            {{ $country->title }}
                        </div>
                        <div class="col-xl-3 col-lg-4 col-md-6 col-12">
                            <b>{{ __('Link') }}:</b>
                            <a href="{{ url($country->link) }}" target="_blank">
                                {{ $country->link ?? '-' }}
                            </a>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-md-6 col-12">
                            <b>{{ __('Code') }}:</b>
                            {{ $country->code ?? '-' }}
                        </div>
                        <div class="col-xl-3 col-lg-4 col-md-6 col-12">
                            <b>{{ __('Flag') }}:</b>
                            {{ $country->flag ?? '-' }}
                        </div>
                        <div class="col-xl-3 col-lg-4 col-md-6 col-12">
                            <b>{{ __('Flag Alt') }}:</b>
                            {{ $country->flag_alt ?? '-' }}
                        </div>
                        <div class="col-md-6 col-12">
                            <b>{{ __('Flag Info') }}:</b>
                            {!! $country->flag_info ?? '-' !!}
                        </div>
                        <div class="col-xl-3 col-lg-4 col-md-6 col-12">
                            <b>{{ __('Parent ID') }}:</b>
                            {{ $country->parent_id ?? '-' }}
                        </div>
                        <div class="col-xl-3 col-lg-4 col-md-6 col-12">
                            <b>{{ __('Web Data ID') }}:</b>
                            {{ $country->web_data_id ?? '-' }}
                        </div>
                        <div class="col-xl-3 col-lg-4 col-md-6 col-12">
                            <b>{{ __('Order') }}:</b>
                            {!! $country->left ?? '-' !!}
                        </div>
                        <div class="col-xl-3 col-lg-4 col-md-6 col-12">
                            <b>{{ __('Active') }}:</b>
                            {{ $country->active ? __('True') : __('False') }}
                        </div>
                        <div class="col-xl-3 col-lg-4 col-md-6 col-12">
                            <b>{{ __('Date Created') }}:</b>
                            {{ $country->created_at ? $country->created_at->format('Y-m-d H:i:s') : '-' }}
                        </div>
                        <div class="col-xl-3 col-lg-4 col-md-6 col-12">
                            <b>{{ __('Updated Date') }}:</b>
                            {{ $country->updated_at ? $country->updated_at->format('Y-m-d H:i:s') : '-' }}
                        </div>
                        <div class="col-12">
                            <b>{{ __('Description') }}:</b>
                            {!! $country->body ?? '-' !!}
                        </div>
                    </div>
                </div>
                <div class="card-footer d-flex align-items-center">
                    <a href="{{ route('countries.index') }}" class="btn btn-secondary">
                        {{ __('Back to countries') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
