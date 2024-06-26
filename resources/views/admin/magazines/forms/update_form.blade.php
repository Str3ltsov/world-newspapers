<form method="post" action="{{ route('magazines.update', $magazine->id) }}" enctype="multipart/form-data" files="true">
    @method('PUT')
    @csrf
    <div class="card-body">
        <div class="row">
            <div class="form-group col-md-6 col-12">
                <label for="title">{{ __('Title') }}</label>
                <input type="text" class="form-control" id="title" placeholder="{{ __('Title') }}" name="title"
                    value="{{ $magazine->title }}">
                @error('title')
                    <div class="text-danger mt-2">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group col-md-6 col-12">
                <label for="url">{{ __('URL') }}</label>
                <input type="text" class="form-control" id="url" placeholder="{{ __('URL') }}"
                    name="url" value="{{ $magazine->url }}">
                @error('url')
                    <div class="text-danger mt-2">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group col-12">
                <label for="description">{{ __('Description') }}</label>
                <textarea class="form-control" rows="3" spellcheck="false" placeholder="{{ __('Description') }}"
                    name="description" id="description">{!! $magazine->description !!}</textarea>
                @error('description')
                    <div class="text-danger mt-2">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group col-md-6 col-12">
                <label for="exampleInputFile">{{ __('Cover') }}</label>
                <div class="input-group">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="cover" name="cover">
                        <label class="custom-file-label" for="cover">
                            {{ __('Choose file (jpeg, jpg, png)') }}
                        </label>
                    </div>
                </div>
                @error('cover')
                    <div class="text-danger mt-2">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group col-md-6 col-12">
                <label for="cover_alt">{{ __('Cover Alt') }}</label>
                <input type="text" class="form-control" id="cover_alt" placeholder="{{ __('Cover Alt') }}"
                    name="cover_alt" value="{{ $magazine->cover_alt }}">
                @error('cover_alt')
                    <div class="text-danger mt-2">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group col-md-6 col-12">
                <label for="date">{{ __('Date') }}</label>
                <input type="date" class="form-control" id="date" name="date"
                    value="{{ $magazine->date ? $magazine->date->format('Y-m-d') : '' }}">
                @error('date')
                    <div class="text-danger mt-2">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group col-md-6 col-12">
                <label for="link_id">{{ __('Link') }}</label>
                <select class="custom-select" id="link_id" name="link_id">
                    <option value="">---</option>
                    @foreach ($links as $link)
                        <option value="{{ $link->id }}" @if ($magazine->link_id == $link->id) selected @endif>
                            {{ $link->title }}
                        </option>
                    @endforeach
                </select>
                @error('link_id')
                    <div class="text-danger mt-2">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group col-12 mt-3">
                <div class="icheck-primary d-inline">
                    <input type="checkbox" id="active" @if ($magazine->active) checked @endif
                        onchange="changeActiveValue()">
                    <label for="active">
                        {{ __('Active') }}
                    </label>
                    <input type="hidden" name="active" id="activeValue" value="{{ $magazine->active ? 1 : 0 }}">
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
        <a href="{{ route('magazines.index') }}" class="btn btn-secondary">
            {{ __('Back to magazines') }}
        </a>
    </div>
</form>
