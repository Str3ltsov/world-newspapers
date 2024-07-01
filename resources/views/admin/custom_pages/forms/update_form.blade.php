<form method="post" action="{{ route('custom_pages.update', $custom_page->id) }}" enctype="multipart/form-data"
    files="true">
    @method('PUT')
    @csrf
    <div class="card-body">
        <div class="row">
            <input type="hidden" name="user_id" value="{{ $custom_page->user_id }}">
            <input type="hidden" name="type_id" value="{{ $custom_page->type_id }}">
            <div class="form-group col-lg-4 col-md-6 col-12">
                <label for="title">{{ __('Title') }}</label>
                <input type="text" class="form-control" id="title" placeholder="{{ __('Title') }}"
                    name="title" value="{{ $custom_page->title }}">
                @error('title')
                    <div class="text-danger mt-2">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group col-lg-4 col-md-6 col-12">
                <label for="title">{{ __('Slug') }}</label>
                <input type="text" class="form-control" id="slug" placeholder="{{ __('Slug') }}"
                    name="slug" value="{{ $custom_page->slug }}">
                @error('slug')
                    <div class="text-danger mt-2">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group col-lg-4 col-md-6 col-12">
                <label for="path">{{ __('Path') }}</label>
                <input type="text" class="form-control" id="path" placeholder="{{ __('Path') }}"
                    name="path" value="{{ $custom_page->path }}">
                @error('path')
                    <div class="text-danger mt-2">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group col-12">
                <label for="body_editor">{{ __('Body') }}</label>
                <textarea class="form-control" rows="3" spellcheck="false" placeholder="{{ __('Body') }}" name="body"
                    id="body_editor">{!! $custom_page->body !!}</textarea>
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
