<form method="post" action="{{ route('countries.update', $country->id) }}" enctype="multipart/form-data" files="true">
    @method('PUT')
    @csrf
    <div class="card-body">
        <div class="row">
            <input type="hidden" name="is_a_parent" value="{{ $isAParent }}">
            <div class="form-group col-lg-4 col-md-6 col-12">
                <label for="title">{{ __('Title') }}</label>
                <input type="text" class="form-control" id="title" placeholder="{{ __('Title') }}"
                    name="title" value="{{ $country->title }}">
                @error('title')
                    <div class="text-danger mt-2">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group col-lg-4 col-md-6 col-12">
                <label for="link">{{ __('Link') }}</label>
                <input type="text" class="form-control" id="link" placeholder="{{ __('Link') }}"
                    name="link" value="{{ $country->link }}">
                @error('link')
                    <div class="text-danger mt-2">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group col-lg-4 col-md-6 col-12">
                <label for="code">{{ __('Code') }}</label>
                <input type="text" class="form-control" id="code" placeholder="{{ __('Code') }}"
                    name="code" value="{{ $country->code }}">
                @error('code')
                    <div class="text-danger mt-2">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group col-12">
                <label for="body">{{ __('Body') }}</label>
                <textarea class="form-control" rows="3" spellcheck="false" placeholder="{{ __('Body') }}" name="body"
                    id="body_editor">{!! $country->body !!}</textarea>
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
                    name="flag_alt" value="{{ $country->flag_alt }}">
                @error('flag_alt')
                    <div class="text-danger mt-2">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group col-lg-4 col-md-6 col-12">
                <label for="flag_info">{{ __('Flag Info') }}</label>
                <textarea class="form-control" rows="1" spellcheck="false" placeholder="{{ __('Flag Info') }}" name="flag_info"
                    id="flag_info">{!! $country->flag_info !!}</textarea>
                @error('flag_info')
                    <div class="text-danger mt-2">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group col-lg-4 col-md-6 col-12">
                <label for="web_data_id">{{ __('Webpage Data') }}</label>
                <select class="custom-select" id="web_data_id" name="web_data_id">
                    <option value="">---</option>
                    @foreach ($webData as $webDataInstance)
                        <option value="{{ $webDataInstance->id }}" @if ($webDataInstance->id == $country->web_data_id) selected @endif>
                            {{ $webDataInstance->title }}
                        </option>
                    @endforeach
                </select>
                @error('web_data_id')
                    <div class="text-danger mt-2">{{ $message }}</div>
                @enderror
            </div>
            @if (!$isAParent)
                <div class="form-group col-lg-4 col-md-6 col-12">
                    <label for="parent_id">{{ __('Parent') }}</label>
                    <select class="custom-select" id="parent_id" name="parent_id">
                        <option value="">---</option>
                        @foreach ($parentLinks as $link)
                            <option value="{{ $link->id }}" @if ($link->id == $country->parent_id) selected @endif>
                                {{ $link->title }}
                            </option>
                        @endforeach
                    </select>
                    @error('parent_id')
                        <div class="text-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>
            @endif
            <div class="form-group col-12 mt-3">
                <div class="icheck-primary d-inline">
                    <input type="checkbox" id="active" @if ($country->active) checked @endif
                        onchange="changeActiveValue()">
                    <label for="active">
                        {{ __('Active') }}
                    </label>
                    <input type="hidden" name="active" id="activeValue" value="{{ $country->active }}">
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
