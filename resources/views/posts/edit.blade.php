@extends('layouts.app')

@section('title')
    Post: {{ $post->title }}
@endsection

@section('description')
    {{ $post->meta_description }}
@endsection

@section('keywords')
    {{ $post->meta_keywords }}
@endsection


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('posts.update', $post->id)  }}" enctype="multipart/form-data">
                        @method ( 'PUT')
                        @csrf

                        <input id="author_id" type="text" name="author_id" value="{{ $post->author_id }}" hidden>

                        <div class="form-group row">
                            <label for="category_id" class="col-md-4 col-form-label text-md-right">{{ __('Category') }}</label>

                            <div class="col-md-6">
                                <select id="category_id" name="category_id">
                                    @foreach ($categories as $category)
                                        @if ($category->id == $post->category_id)
                                            <option value="{{$category->id}}" selected>{{$category->title}}</option>
                                        @endif
                                        <option value="{{$category->id}}">{{$category->title}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <!-- Images upload -->
                        <div class="row justify-content-center">
                            <div class="col-md-6 text-center">
                                @if ($post->image)
                                    <img src="{{ asset($post->image) }}" alt="image" width="200px">
                                @else
                                    <img src="{{ asset('/images/NonIzo.png') }}" alt="image" width="200px">
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                    <input type="file" name="image">
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
                                <textarea id="body" type="text" class="form-control @error('body') is-invalid @enderror" name="body" required autocomplete="body" autofocus>{!! $post->body !!}</textarea>

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
                                <textarea id="meta_description" type="text" class="form-control @error('meta_description') is-invalid @enderror" name="meta_description" required autocomplete="meta_description">{!! $post->meta_description !!}</textarea>

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
