<form method="post" action="{{ route('links.store') }}">
    @csrf
    <div class="card-body">
        <div class="row">
            <input type="hidden" name="is_a_parent" value="{{ $isAParent }}">
            <div class="form-group col-lg-4 col-md-6 col-12">
                <label for="title">{{ __('Title') }}</label>
                <input type="text" class="form-control" id="title" placeholder="{{ __('Title') }}"
                    name="title">
                @error('title')
                    <div class="text-danger mt-2">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group col-lg-4 col-md-6 col-12">
                <label for="url">{{ __('Class') }}</label>
                <input type="text" class="form-control" id="class" placeholder="{{ __('Class') }}"
                    name="class">
                @error('class')
                    <div class="text-danger mt-2">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group col-lg-4 col-md-6 col-12">
                <label for="url">{{ __('Link') }}</label>
                <input type="text" class="form-control" id="link" placeholder="{{ __('Link') }}"
                    name="link">
                @error('link')
                    <div class="text-danger mt-2">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group col-lg-6 col-12">
                <label for="description">{{ __('Description') }}</label>
                <textarea class="form-control" rows="3" spellcheck="false" placeholder="{{ __('Description') }}"
                    name="description" id="description_editor"></textarea>
                @error('description')
                    <div class="text-danger mt-2">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group col-lg-6 col-12">
                <label for="body">{{ __('Body') }}</label>
                <textarea class="form-control" rows="3" spellcheck="false" placeholder="{{ __('Body') }}" name="body"
                    id="body_editor"></textarea>
                @error('body')
                    <div class="text-danger mt-2">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group col-lg-4 col-md-6 col-12">
                <label for="menu_id">{{ __('Menu') }}</label>
                <select class="custom-select" id="menu_id" name="menu_id">
                    <option value="{{ $menu->id }}">
                        {{ $menu->title }}
                    </option>
                </select>
                @error('menu_id')
                    <div class="text-danger mt-2">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group col-lg-4 col-md-6 col-12">
                <label for="web_data_id">{{ __('Webpage Data') }}</label>
                <select class="custom-select" id="web_data_id" name="web_data_id">
                    <option value="">---</option>
                    @foreach ($webData as $webDataInstance)
                        <option value="{{ $webDataInstance->id }}">
                            {{ $webDataInstance->title }}
                        </option>
                    @endforeach
                </select>
                @error('parent_id')
                    <div class="text-danger mt-2">{{ $message }}</div>
                @enderror
            </div>
            @if (!$isAParent)
                <div class="form-group col-lg-4 col-md-6 col-12">
                    <label for="parent_id">{{ __('Parent') }}</label>
                    <select class="custom-select" id="parent_id" name="parent_id">
                        <option value="">---</option>
                        @foreach ($parentLinks as $link)
                            <option value="{{ $link->id }}">
                                {{ $link->title }}
                            </option>
                        @endforeach
                    </select>
                    @error('parent_id')
                        <div class="text-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>
            @endif
        </div>
    </div>
    <div class="card-footer">
        <button type="submit" class="btn btn-primary">
            {{ __('Submit') }}
        </button>
        <a href="{{ route('links.index') }}" class="btn btn-secondary">
            {{ __('Back to links') }}
        </a>
    </div>
</form>
