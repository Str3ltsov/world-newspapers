<form method="post" action="{{ route('news.update', $newsInstance->id) }}" enctype="multipart/form-data" files="true">
    @method('PUT')
    @csrf
    <div class="card-body">
        <div class="row">
            <input type="hidden" name="news_type" value="{{ $newsType }}">
            <div class="form-group col-lg-4 col-md-6 col-12">
                <label for="title">{{ __('Title') }}</label>
                <input type="text" class="form-control" id="title" placeholder="{{ __('Title') }}"
                    name="title" value="{{ $newsInstance->title }}">
                @error('title')
                    <div class="text-danger mt-2">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group col-lg-4 col-md-6 col-12">
                <label for="url">{{ __('URL') }}</label>
                <input type="text" class="form-control" id="url" placeholder="{{ __('URL') }}"
                    name="url" value="{{ $newsInstance->url }}">
                @error('url')
                    <div class="text-danger mt-2">{{ $message }}</div>
                @enderror
            </div>
            @if ($newsType == 2)
                <div class="form-group col-lg-4 col-md-6 col-12">
                    <label>{{ __('Logo') }}</label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="logo" name="logo">
                            <label class="custom-file-label" for="logo
                            ">
                                {{ __('Choose file (jpeg, jpg, png)') }}
                            </label>
                        </div>
                    </div>
                    @error('logo')
                        <div class="text-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group col-lg-4 col-md-6 col-12">
                    <label for="logo_alt">{{ __('Logo Alt') }}</label>
                    <input type="text" class="form-control" id="logo_alt" placeholder="{{ __('Logo Alt') }}"
                        name="logo_alt" value="{{ $newsInstance->logo_alt }}">
                    @error('logo_alt')
                        <div class="text-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>
            @endif
            <div class="form-group col-lg-4 col-md-6 col-12">
                <label for="date">{{ __('Date') }}</label>
                <input type="date" class="form-control" id="date" name="date"
                    value="{{ $newsInstance->date ? $newsInstance->date->format('Y-m-d') : '' }}">
                @error('date')
                    <div class="text-danger mt-2">{{ $message }}</div>
                @enderror
            </div>
            @if ($newsType == 1)
                <div class="form-group col-lg-4 col-md-6 col-12">
                    <label for="link_id">{{ __('Categories') }}</label>
                    <select class="custom-select" id="link_id" name="link_id">
                        <option value="">---</option>
                        @foreach ($links as $link)
                            <option value="{{ $link->id }}" @if ($newsInstance->link_id == $link->id) selected @endif>
                                {{ $link->title }}
                            </option>
                        @endforeach
                    </select>
                    @error('link_id')
                        <div class="text-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>
            @endif
            @if ($newsType == 2)
                <div class="form-group col-lg-4 col-md-6 col-12">
                    <label for="country_id">{{ __('Country') }}</label>
                    <select class="custom-select" id="country_id" name="country_id">
                        <option value="">---</option>
                        @foreach ($countries as $country)
                            <option value="{{ $country->id }}" @if ($newsInstance->country_id == $country->id) selected @endif>
                                {{ $country->title }}
                            </option>
                        @endforeach
                    </select>
                    @error('country_id')
                        <div class="text-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>
            @endif
            <div class="form-group col-12">
                <label for="description">{{ __('Description') }}</label>
                <textarea class="form-control" rows="3" spellcheck="false" placeholder="{{ __('Description') }}"
                    name="description" id="description">{!! $newsInstance->description !!}</textarea>
                @error('description')
                    <div class="text-danger mt-2">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group col-12 mt-3">
                <div class="icheck-primary d-inline">
                    <input type="checkbox" id="active" @if ($newsInstance->active) checked @endif
                        onchange="changeActiveValue()">
                    <label for="active">
                        {{ __('Active') }}
                    </label>
                    <input type="hidden" name="active" id="activeValue" value="{{ $newsInstance->active }}">
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
        <a href="{{ route('news.index') }}" class="btn btn-secondary">
            {{ __('Back to news') }}
        </a>
    </div>
</form>
