<form class="row gap-3" action="{{ route('sendMessage') }}" method="post">
    @method('POST')
    @csrf
    <div class="col-12 d-flex flex-md-row flex-column">
        <label for="name" class="form-label col-sm-2 text-muted">
            {{ __('Your name') }}
        </label>
        <div class="d-flex flex-column col-md-10 col-12">
            <input type="text" class="form-control bg-white rounded-0 @error('name') is-invalid @enderror" 
                id="name" name="name">
            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="col-12 d-flex flex-md-row flex-column">
        <label for="email" class="form-label col-sm-2 text-muted">
            {{ __('Your email') }}
        </label>
        <div class="d-flex flex-column col-md-10 col-12">
            <input type="text" class="form-control bg-white rounded-0 @error('email') is-invalid @enderror" 
                id="email" name="email">
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="col-12 d-flex flex-md-row flex-column">
        <label for="subject" class="form-label col-sm-2 text-muted">
            {{ __('Subject') }}
        </label>
        <div class="d-flex flex-column col-md-10 col-12">
            <input type="text" class="form-control bg-white rounded-0 @error('subject') is-invalid @enderror" 
                id="subject" name="subject">
            @error('subject')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="col-12 d-flex flex-md-row flex-column">
        <label for="message" class="form-label col-sm-2 text-muted">
            {{ __('Message') }}
        </label>
        <div class="d-flex flex-column col-md-10 col-12">
            <textarea class="form-control bg-white rounded-0 @error('message') is-invalid @enderror" 
                id="message" name="message" rows="5"></textarea>
            @error('message')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="col-12 d-flex mt-1">
        <div class="col-sm-2"></div>
        <div class="col-md-10 col-12">
            {!! NoCaptcha::renderJs() !!}
            {!! NoCaptcha::display() !!}
            @error('g-recaptcha-response')
                <div class="mt-1">
                    <span class="text-danger fw-bold" style="font-size: .9em">{{ $message }}</span>
                </div>
            @enderror
        </div>
    </div>
    <div class="col-12 d-flex mt-1">
        <div class="col-sm-2"></div>
        <button type="submit" class="btn send-button text-white">
            {{ __('Send') }}
        </button>
    </div>
</form>