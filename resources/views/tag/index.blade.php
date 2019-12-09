@extends('layouts.app')

@section('title')
    Tags list
@endsection

@section('description')
    This pages tags list
@endsection

@section('keywords')
    All tags, list
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 text-center">
            <h1>This tag list</h1>
        </div>
    </div>
    <div class="row">
        @foreach ($tags as $tag)
            <div class="col-12 col-md-4 col-lg-3 card">
                <div class="card-body">
                    <h5 class="card-title">{{ $tag->title }}</h5>
                    <h6 class="card-subtitle mb-2 text-muted">This tag includes the following news:</h6>
                    @foreach ($tag->posts as $post)
                        <p class="card-text"><a href="/posts/{{ $post->id }}"> {!! $post->title !!} </a></p>
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
