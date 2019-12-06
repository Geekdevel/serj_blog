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
                @if ($user)
                    <div class="card-header text-center">Welcome to {{ mb_strtoupper($user->roles->role) }} {{ $user->first_name.' '.$user->last_name }}</div>
                @else
                    <div class="card-header text-center">Welcome to post!</div>
                @endif
                <h3>
                    Category:
                    <a href="
                        @if ($post->category)
                        /category/{{$post->category_id}}
                        @else
                        #
                        @endif
                        ">
                        {{ $post->category->title ? $post->category->title : 'Last category.' }}
                    </a>
                </h3>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 text-center">
                            <h2>{!! $post->title !!}</h2>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 text-center">
                            <img src="{{ $post->image ? '/storage/'.$post->image : asset('images/NonIzo.png') }}" alt="{{ $post->title}}" width="300px">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            {!! $post->body !!}
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <p style="text-align: center;"> Author: {{ $post->user ? $post->user->first_name.' '.$post->user->last_name : 'Incognito.' }}</p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <p style="text-align: center;"> Created: {{ $post->created_at }}; Updated: {{ $post->updated_at }}</p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <p style="text-align: center;"> Tags:</p>
                            @guest
                                <p style="text-align: center;">
                                    @if ($post->tags)
                                        @foreach ($post->tags as $tag)
                                            <a href="#">{{ $tag->title }}</a>
                                        @endforeach
                                    @endif
                                </p>
                            @endguest
                            @auth
                                <p style="text-align: center;" id="tags_show">

                                </p>
                            @endauth
                        </div>
                    </div>
                    @if ($user)
                        <div class="row justify-content-center">
                            <div class="col-8">
                                <form action="#" method="POST">
                                    @csrf

                                    <div class="form-group row">
                                        <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('ADD tag:') }}</label>

                                        <div class="col-md-6">
                                             <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" required autocomplete="title" autofocus>

                                            @error('title')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row mb-0">
                                        <div class="col-md-6 offset-md-4 text-center">
                                            <button type="submit" class="btn btn-success" id="add_tag">
                                                {{ __('ADD') }}
                                            </button>
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>
                    @endif
                </div>
                <div class="card-footer">
                    @if ($user)
                    <div class="row justify-content-center">
                        <div class="col-6 text-center">
                            <a href="{{ route('posts.edit', $post->id)}}" class="btn btn-primary">EDIT</a>
                        </div>
                        <div class="col-6 text-center">
                            <form action="{{ route('posts.destroy', $post->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit">Delete</button>
                            </form>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
