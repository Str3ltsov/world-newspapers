<form method="post" action="{{ route('custom_pages.store') }}" enctype="multipart/form-data" files="true">
    @csrf
    <div class="card-body">
        <p>
            <b>{{ __('Note') }}:</b>
            {{ __('A link is required to be created for this custom page to work!') }}
        </p>
        <div class="row">
            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
            <input type="hidden" name="type_id" value="{{ \App\Models\Type::PAGE }}">
            <div class="form-group col-lg-4 col-md-6 col-12">
                <label for="title">{{ __('Title') }}</label>
                <input type="text" class="form-control" id="title" placeholder="{{ __('Title') }}"
                    name="title">
                @error('title')
                    <div class="text-danger mt-2">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group col-lg-4 col-md-6 col-12">
                <label for="title">{{ __('Slug') }}</label>
                <input type="text" class="form-control" id="slug" placeholder="{{ __('Slug') }}"
                    name="slug">
                @error('slug')
                    <div class="text-danger mt-2">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group col-lg-4 col-md-6 col-12">
                <label for="path">{{ __('Path') }}</label>
                <input type="text" class="form-control" id="path" placeholder="{{ __('Path') }}"
                    name="path">
                @error('path')
                    <div class="text-danger mt-2">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group col-12">
                <label for="body_editor">{{ __('Body') }}</label>
                <textarea class="form-control" rows="3" spellcheck="false" placeholder="{{ __('Body') }}" name="body"
                    id="body_editor"></textarea>
                @error('body')
                    <div class="text-danger mt-2">{{ $message }}</div>
                @enderror
            </div>
        </div>
    </div>
    <div class="card-footer">
        <button type="submit" class="btn btn-primary">
            {{ __('Submit') }}
        </button>
        <a href="{{ route('custom_pages.index') }}" class="btn btn-secondary">
            {{ __('Back to custom pages') }}
        </a>
    </div>
</form>
