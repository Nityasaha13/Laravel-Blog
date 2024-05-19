@extends('layouts.master')

@section('content')

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Create Post') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('posts.store') }}">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="title">{{ __('Title') }}</label>
                            <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" required autocomplete="title" autofocus placeholder="{{ __('Enter Title') }}">
                            @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="content">{{ __('Content') }}</label>
                            <textarea id="content" class="form-control @error('content') is-invalid @enderror" name="content" rows="5" required placeholder="{{ __('Enter Content') }}">{{ old('content') }}</textarea>
                            @error('content')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="categories">{{ __('Categories') }}</label>
                            <select id="categories" class="form-control @error('categories') is-invalid @enderror" name="categories[]" multiple="multiple">
                                <option>tech</option>
                                <option>blog</option>
                                <option>news</option>
                            </select>
                            @error('categories')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group mb-0">
                            <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection

@section('link-script')

<script>
    $(document).ready(function() {
        $('#categories').select2();
    });
</script>

@endsection
