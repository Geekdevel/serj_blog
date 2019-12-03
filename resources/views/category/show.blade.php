@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-center">
                    @if (!empty($user))
                        <h2>Welcome {{ $user->first_name }} {{ $user->last_name }}!</h2>
                    @else
                        <h2>Welcom main liben frend!</h2>
                    @endif
                    <h1>{{ $category->title }}</h1>
                </div>
                <div class="card-body text-center">
                    <div class="row">
                        <div class="col-md-12 text-justifay">
                            {{ $category->description }}
                        </div>
                        @if (!empty($user))
                            @if ($role == 'admin')
                                <a href="category/{{ $category->id }}/edit" class="btn btn-success">EDIT</a>
                                    <form action="{{ route('category.destroy', $category->id)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger" type="submit">DELETE</button>
                                    </form>
                            @endif
                        @endif
                    </div>
                    @if (empty($aliarm))
                        @foreach ( $posts as $post )
                            <div class="row">
                                <div class="card">
                                    <img class="card-img-top" src="{{ !empty($post->image) ? $post->image : asset('images/NonIzo.png')}}" alt="Card image cap" style="width: 200px; height: 200px; margin: auto;">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $post->title }}</h5>
                                        <p class="card-text">{{ $post->body }}</p>
                                    </div>
                                    <ul class="list-group list-group-flush">
                                        @if (!empty($post->user))
                                            <li class="list-group-item">Author: {{ $post->user->first_name }} {{ $post->user->last_name }} </li>
                                        @else
                                            <li class="list-group-item">Author: Incognito </li>
                                        @endif
                                        <li class="list-group-item">
                                            Tags:
                                            @foreach ($post->tags as $tag)
                                                $tag->title
                                            @endforeach
                                        </li>
                                    </ul>
                                    <div class="card-body">
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
                            <h2>{{ $aliarm }}</h2>
                            <a href="/category/create" class="btn btn-success">CREATE</a>
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
