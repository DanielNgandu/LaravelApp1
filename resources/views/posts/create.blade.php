@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-4">
                <label for="username" class="col-md-4 col-form-label ">{{ __('Upload Image') }}</label>

                <input id="image" type="file"
                       class="form-control-file @error('image') is-invalid @enderror"
                       name="image" value="{{ old('image') }}" required autocomplete="image" autofocus>

                @error('image')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
            </div>
            <div class="col-8 offset-2">
                <div class="form-group row">
                    <label for="username" class="col-md-4 col-form-label ">{{ __('Post Caption') }}</label>

                        <input id="text" type="text"
                               class="form-control @error('text') is-invalid @enderror"
                               name="text" value="{{ old('text') }}" required autocomplete="text" autofocus>

                        @error('text')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                </div>

            </div>

        </div>
    </div>
@endsection
