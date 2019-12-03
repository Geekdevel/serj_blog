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
                            @endif
                        @endif
                    </div>
                    @foreach ( $posts as $post )
                        <div class="row">
                            <div class="card">
                                <img class="card-img-top" src="{{asset( $post->image ? $post->image : 'images/NonIzo.png')}}" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title">{{ $post->title }}</h5>
                                <p class="card-text">{{ $post->body }}</p>
                            </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">Author: {{ $post->user->first_name }} {{ $post->user->last_name }} </li>
                                <li class="list-group-item">
                                    Tags:
                                    @foreach ($post->tags as $tag)
                                        $tag->title
                                    @endforeach
                                </li>
                            </ul>
                            @if (!empty($user))
                                <div class="card-body">
                                    <a href="category/{{ $post->id }}/edit" class="btn btn-success">EDIT</a>
                                    <form action="{{ route('category.destroy', $post->id)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger" type="submit">DELETE</button>
                                    </form>
                                </div>
                            @endif
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
