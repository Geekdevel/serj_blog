@extends('layouts.app')

@section('title')
    {{ $tag->title }}
@endsection

@section('description')
    This pages {{ $tag->title }}
@endsection

@section('keywords')
    @foreach ($tag->posts as $post)
        {{ strip_tags($post->title) }}.', '
    @endforeach
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 text-center">
            <h1>{{ $tag->title }}</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-12 card">
            <div class="card-body">
                <h5 class="card-title">{{ $tag->title }}</h5>
                <h6 class="card-subtitle mb-2 text-muted">This tag includes the following news:</h6>
                @foreach ($tag->posts as $post)
                    <p class="card-text"><a href="/posts/{{ $post->id }}"> {!! $post->title !!} </a></p>
                @endforeach
            </div>
            <div class="card-footer text-center">
                <div class="btn-group" role="group">
                    <a href="/tag/{{ $tag->id }}/edit" class="btn btn-primary">EDIT</a>
                    <form action="{{ route('tag.destroy', $tag->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit">DELETE</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
