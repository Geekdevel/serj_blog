@extends('layouts.app')

@section('title')
    Posts list
@endsection

@section('description')
    This pages list posts
@endsection

@section('keywords')
    All posts, list
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 text-center">
            <h1>This Posts list</h1>
            @auth
                <h4>Welcome {{ auth()->user()->roles->role }} {{ mb_strtoupper(auth()->user()->first_name).' '.mb_strtoupper(auth()->user()->last_name)}}</h4>
                <a href="/posts/create" class="btn btn-primary">Post create</a>
            @endauth
            @guest
                <h4>Welcome main liben frend!</h4>
            @endguest
        </div>
    </div>

    <div class="row justify-content-center">
        @foreach ($posts as $post)
            <div class="col-12 col-md-4 col-lg-3 card">
                <div class="card-body">
                    <img class="" src="{{ $post->image ? '/storage/'.$post->image : asset('images/NonIzo.png')}}" alt="{{ $post->title }}" style="margin: auto;" width="200px">
                    <h5 class="card-title text-center">
                        <a href="/posts/{{ $post->id }}"> {!! $post->title !!}</a>
                    </h5>
                    <p class="text-justify">{!! mb_strimwidth($post->body, 0, 255) !!}</p>
                </div>
                <div class="btn-group">
                    @auth
                        <a href="/posts/{{ $post->id }}/edit" class="btn btn-success">EDIT</a>
                        <form action="{{ route('posts.destroy', $post->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit">DELETE</button>
                        </form>
                    @endauth
                    <a href="/posts/{{ $post->id }}" class="btn btn-primary">SHOW</a>
                </div>
                <div class="card-footer">
                    <ul class="list-group list-group-flush">
                        @if ($post->user)
                            <li class="list-group-item">Author: {{ $post->user->first_name }} {{ $post->user->last_name }} </li>
                        @else
                            <li class="list-group-item">Author: Incognito </li>
                        @endif
                        <li class="list-group-item">
                            Tags:
                        @foreach ($post->tags as $tag)
                            <a href="/tag/{{ $tag->id }}">{{$tag->title}}</a>
                        @endforeach
                        </li>
                    </ul>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
