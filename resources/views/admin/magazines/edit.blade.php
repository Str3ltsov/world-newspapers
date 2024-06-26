@extends('layouts.admin')

@section('title', __('Edit Magazine - ' . $magazine->title))

@section('content')
    @include('session_messages')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        Edit Magazine
                    </h3>
                </div>
                @include('admin.magazines.forms.update_form')
            </div>
        </div>
    </div>

    <script>
        const changeActiveValue = () => {
            const activeCheckbox = document.getElementById('active')
            const activeValue = document.getElementById('activeValue')

            activeCheckbox.checked ? activeValue.value = 1 : activeValue.value = 0;
        }
    </script>
@endsection
