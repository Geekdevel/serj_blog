@extends('layouts.app')

@section('title')
    Blog test Laravel
@endsection

@section('description')
    This first page blog.
@endsection

@section('keywords')
    Blog, category, posts, list.
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">
                    <h1>Welcome to my BLOG!</h1>
                </div>

                <div class="card-body text-center">
                    <h3>Categories in may blog:</h3>
                    <ul class="list-group">
                        @foreach ($categories as $category)
                            <li class="list-group-item">
                                <h5><a href="/category/{{ $category->id }}">{{ $category->title }}</a></h5>
                                <p>How many posts in the category: {{ $category->posts->count() }}</p>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
