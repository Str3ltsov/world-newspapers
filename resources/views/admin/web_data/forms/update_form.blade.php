<form method="post" action="{{ route('web_data.update', $webDataInstance->id) }}">
    @method('PUT')
    @csrf
    <div class="card-body">
        <div class="row">
            <div class="form-group col-lg-4 col-md-6 col-12">
                <label for="title">{{ __('Title') }}</label>
                <input type="text" class="form-control" id="title" placeholder="{{ __('Title') }}" name="title"
                    value="{{ $webDataInstance->title }}">
                @error('title')
                    <div class="text-danger mt-2">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group col-lg-4 col-md-6 col-12">
                <label for="title">{{ __('Heading') }}</label>
                <input type="text" class="form-control" id="heading" placeholder="{{ __('Heading') }}"
                    name="heading" value="{{ $webDataInstance->heading }}">
                @error('heading')
                    <div class="text-danger mt-2">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group col-lg-4 col-md-6 col-12">
                <label for="Description">{{ __('Description') }}</label>
                <input type="text" class="form-control" id="description" placeholder="{{ __('Description') }}"
                    name="description" value="{{ $webDataInstance->description }}">
                @error('description')
                    <div class="text-danger mt-2">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group col-lg-4 col-md-6 col-12">
                <label for="title">{{ __('Keywords') }}</label>
                <input type="text" class="form-control" id="keywords" placeholder="{{ __('Keywords') }}"
                    name="keywords" value="{{ $webDataInstance->keywords }}">
                @error('keywords')
                    <div class="text-danger mt-2">{{ $message }}</div>
                @enderror
            </div>
        </div>
    </div>
    <div class="card-footer">
        <button type="submit" class="btn btn-primary">
            {{ __('Submit') }}
        </button>
        <a href="{{ route('web_data.index') }}" class="btn btn-secondary">
            {{ __('Back to web data') }}
        </a>
    </div>
</form>
