@extends('layouts.app')

@section('title')
    Posts category: {{ $category->title }}
@endsection

@section('description')
    {{ $category->meta_description }}
@endsection

@section('keywords')
    {{ $category->meta_keywords }}
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-center">
                    @if ($user)
                        <h2>Welcome {{ $user->first_name }} {{ $user->last_name }}!</h2>
                    @else
                        <h2>Welcom main liben frend!</h2>
                    @endif
                    <h1>{!! $category->title !!}</h1>
                </div>
                <div class="card-body text-center">
                    <div class="row justify-content-center">
                        <div class="col-md-12 text-justifay">
                            {!! $category->description !!}
                        </div>
                        @if ($user)
                            <div class="row justify-content-center">
                                <div class="col-12 btn-group">
                                    @if ($role == 'admin')
                                        <a href="/category/{{ $category->id }}/edit" class="btn btn-success btn-secondary">EDIT</a>
                                            <form action="{{ route('category.destroy', $category->id)}}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger btn-secondary" type="submit">DELETE</button>
                                            </form>
                                    @endif
                                </div>
                            </div>
                        @endif
                    </div>
                    @if (empty($aliarm))
                        @foreach ( $posts as $post )
                            <div class="row">
                                <div class="card col-md-12">
                                    <img class="card-img-top" src="{{ $post->image ? '/storage/'.$post->image : asset('images/NonIzo.png')}}" alt="{{ $post->title }}" style="margin: auto;">
                                    <div class="card-body">
                                        <h5 class="card-title">{!! $post->title !!}</h5>
                                        <p class="card-text">{!! $post->body !!}</p>
                                    </div>
                                    <ul class="list-group list-group-flush">
                                        @if ($post->user)
                                            <li class="list-group-item">Author: {{ $post->user->first_name }} {{ $post->user->last_name }} </li>
                                        @else
                                            <li class="list-group-item">Author: Incognito </li>
                                        @endif
                                        <li class="list-group-item">
                                            Tags:
                                            @foreach ($post->tags as $tag)
                                                <a href="#">{{$tag->title}}</a>
                                            @endforeach
                                        </li>
                                    </ul>
                                    <div class="card-body btn-group">
                                        @if (!empty($user))
                                            <a href="/posts/{{ $post->id }}/edit" class="btn btn-success">EDIT</a>
                                            <form action="{{ route('posts.destroy', $post->id)}}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger" type="submit">DELETE</button>
                                            </form>
                                        @endif
                                        <a href="/posts/{{ $post->id }}" class="btn btn-primary">SHOW</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="row">
                            <div class="col-12"><h2>{{ $aliarm }}</h2></div>
                        </div>
                        <div class="row">
                            <div class="col-12"><a href="/posts/create" class="btn btn-success">CREATE</a></div>
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
