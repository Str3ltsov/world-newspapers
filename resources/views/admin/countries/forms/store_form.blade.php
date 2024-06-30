<form method="post" action="{{ route('countries.store') }}" enctype="multipart/form-data" files="true">
    @csrf
    <div class="card-body">
        <div class="row">
            <div class="form-group col-lg-4 col-md-6 col-12">
                <label for="title">{{ __('Title') }}</label>
                <input type="text" class="form-control" id="title" placeholder="{{ __('Title') }}"
                    name="title">
                @error('title')
                    <div class="text-danger mt-2">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group col-lg-4 col-md-6 col-12">
                <label for="link">{{ __('Link') }}</label>
                <input type="text" class="form-control" id="link" placeholder="{{ __('Link') }}"
                    name="link">
                @error('link')
                    <div class="text-danger mt-2">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group col-lg-4 col-md-6 col-12">
                <label for="code">{{ __('Code') }}</label>
                <input type="text" class="form-control" id="code" placeholder="{{ __('Code') }}"
                    name="code">
                @error('code')
                    <div class="text-danger mt-2">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group col-12">
                <label for="body">{{ __('Body') }}</label>
                <textarea class="form-control" rows="3" spellcheck="false" placeholder="{{ __('Body') }}" name="body"
                    id="body_editor"></textarea>
                @error('body')
                    <div class="text-danger mt-2">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group col-lg-4 col-md-6 col-12">
                <label>{{ __('Flag') }}</label>
                <div class="input-group">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="flag" name="flag">
                        <label class="custom-file-label" for="flag">
                            {{ __('Choose file (jpeg, jpg, png)') }}
                        </label>
                    </div>
                </div>
                @error('flag')
                    <div class="text-danger mt-2">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group col-lg-4 col-md-6 col-12">
                <label for="flag_alt">{{ __('Flag Alt') }}</label>
                <input type="text" class="form-control" id="flag_alt" placeholder="{{ __('Flag Alt') }}"
                    name="flag_alt">
                @error('flag_alt')
                    <div class="text-danger mt-2">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group col-lg-4 col-md-6 col-12">
                <label for="body_editor">{{ __('Flag Info') }}</label>
                <textarea class="form-control" rows="1" spellcheck="false" placeholder="{{ __('Flag Info') }}" name="flag_info"
                    id="body_editor"></textarea>
                @error('flag_info')
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
                @error('web_data_id')
                    <div class="text-danger mt-2">{{ $message }}</div>
                @enderror
            </div>
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
            <div class="form-group col-12 mt-3">
                <div class="icheck-primary d-inline">
                    <input type="checkbox" id="active" checked onchange="changeActiveValue()">
                    <label for="active">
                        {{ __('Active') }}
                    </label>
                    <input type="hidden" name="active" id="activeValue" value="1">
                </div>
                @error('active')
                    <div class="text-danger mt-2">{{ $message }}</div>
                @enderror
            </div>
        </div>
    </div>
    <div class="card-footer">
        <button type="submit" class="btn btn-primary">
            {{ __('Submit') }}
        </button>
        <a href="{{ route('countries.index') }}" class="btn btn-secondary">
            {{ __('Back to countries') }}
        </a>
    </div>
</form>
