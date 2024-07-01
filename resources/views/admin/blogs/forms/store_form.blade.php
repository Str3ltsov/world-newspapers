<form method="post" action="{{ route('blogs.store') }}" enctype="multipart/form-data" files="true">
    @csrf
    <div class="card-body">
        <div class="row">
            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
            <input type="hidden" name="type_id" value="{{ \App\Models\Type::BLOG }}">
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
                <label for="excerpt">{{ __('Excerpt') }}</label>
                <textarea class="form-control" rows="3" spellcheck="false" placeholder="{{ __('Excerpt') }}" name="excerpt"
                    id="excerpt"></textarea>
                @error('excerpt')
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
        <a href="{{ route('blogs.index') }}" class="btn btn-secondary">
            {{ __('Back to blogs') }}
        </a>
    </div>
</form>
