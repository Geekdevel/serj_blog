@extends('layouts.app')

@section('title')
    Create category!
@endsection

@section('description')
    This page create category.
@endsection

@section('keywords')
    Blog, category, create.
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        @guest
            <div class="col-12 text-center">
                <h1>This page is for registered users!</h1>
                <a href="/" class="btn btn-danger">HOME</a>
            </div>
        @endguest
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="{{ route('category.store') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('Title') }}</label>

                                <div class="col-md-6">
                                    <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" required autocomplete="title" autofocus>

                                    @error('title')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>

                                <div class="col-md-6">
                                    <textarea id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') }}" required autocomplete="description" autofocus></textarea>

                                    @error('description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="meta_keywords" class="col-md-4 col-form-label text-md-right">{{ __('Meta_keywords') }}</label>

                                <div class="col-md-6">
                                    <input id="meta_keywords" type="text" class="form-control @error('meta_keywords') is-invalid @enderror" name="meta_keywords" value="{{ old('meta_keywords') }}" required autocomplete="meta_keywords" autofocus>

                                    @error('meta_keywords')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="meta_description" class="col-md-4 col-form-label text-md-right">{{ __('Meta_description') }}</label>

                                <div class="col-md-6">
                                    <textarea id="meta_description" type="text" class="form-control @error('meta_description') is-invalid @enderror" name="meta_description" value="{{ old('meta_description') }}" required autocomplete="meta_description"></textarea>

                                    @error('meta_description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Save') }}
                                    </button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
    </div>
</div>
@endsection
