@extends('layouts.app')

@section('title')
    Tags create
@endsection

@section('description')
    This pages tags create
@endsection

@section('keywords')
    tag, create
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 text-center">
            <h1>This pages create tag</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-12 card">
            <form method="POST" action="{{ route('tag.store') }}">
                @csrf

                <div class="form-group row" style="margin-top: 10px;">
                    <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('Title tag') }}</label>

                    <div class="col-md-6">
                        <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" required autocomplete="title" autofocus>

                        @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div id="posts_list">
                    <div class="form-group row post_id">
                        <label for="post_id" class="col-md-4 col-form-label text-md-right">{{ __('Post title') }}</label>

                        <div class="col-md-6">
                            <select name="post_id[]">
                                @foreach ($posts as $key => $value)
                                    <option class="post" value="{{ $key }}">{!! $value !!}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <div class="form-group row justify-content-center">
                    <div class="col-md-4 text-center">
                        <button type="" class="btn btn-primary" id="tag_add">
                            {{ __('+ADD') }}
                        </button>
                    </div>

                    <div class="col-md-4 text-center">
                        <button type="submit" class="btn btn-success">
                            {{ __('Save') }}
                        </button>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>
@endsection
