@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('posts.update') }}">
                        @method ( 'PUT')
                        @csrf

                        <input id="user" type="text" name="user" value="{{ $post->author_id }}" hidden>

                        <div class="form-group row">
                            <label for="category" class="col-md-4 col-form-label text-md-right">{{ __('Category') }}</label>

                            <div class="col-md-6">
                                <select id="category" name="category">
                                    @foreach ($categories as $category)
                                        @if ($category->id == $post->category_id)
                                            <option value="{{$category->id}}" selected>{{$category->title}}</option>
                                        @endif
                                        <option value="{{$category->id}}">{{$category->title}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('Title') }}</label>

                            <div class="col-md-6">
                                 <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ $post->title }}" required autocomplete="title" autofocus>

                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="body" class="col-md-4 col-form-label text-md-right">{{ __('Body') }}</label>

                            <div class="col-md-6">
                                <textarea id="body" type="text" class="form-control @error('body') is-invalid @enderror" name="body" value="{{ $post->body }}" required autocomplete="body" autofocus></textarea>

                                @error('body')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="meta_keywords" class="col-md-4 col-form-label text-md-right">{{ __('Meta_keywords') }}</label>

                            <div class="col-md-6">
                                <input id="meta_keywords" type="text" class="form-control @error('meta_keywords') is-invalid @enderror" name="meta_keywords" value="{{ $post->meta_keywords }}" required autocomplete="meta_keywords" autofocus>

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
                                <textarea id="meta_description" type="text" class="form-control @error('meta_description') is-invalid @enderror" name="meta_description" value="{{ $post->meta_description }}" required autocomplete="meta_description"></textarea>

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
