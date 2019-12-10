@extends('layouts.app')

@section('title')
    Category list.
@endsection

@section('description')
    This page list category.
@endsection

@section('keywords')
    Blog, category, list.
@endsection

@section('content')
    <div class="row justify-content-center">
         <div class="col-12 text-center">
            <h1>This Categories list</h1>
            <h4>Welcome {{ auth()->user()->roles->role }} {{ mb_strtoupper(auth()->user()->first_name).' '.mb_strtoupper(auth()->user()->last_name)}}</h4>
        </div>
    </div>

    @if (auth()->user()->roles->role == 'admin')
    <div class="row justify-content-center">
         <div class="col-12 text-center">
            <a href="/category/create" class="btn btn-success">Create category</a>
        </div>
    </div>
    @endif

    <div class="row justify-content-center">
        @foreach ($categories as $category)
            <div class="col-12 col-md-4 col-lg-3 card">
                <div class="card-body">
                    <h5 class="card-title text-center">
                        <a href="/category/{{ $category->id }}"> {!! $category->title !!}</a>
                    </h5>
                    <p class="text-justify">{!! $category->description !!}</p>
                </div>

                <div class="card-footer">
                    <div class="row justify-content-center">
                        @if (auth()->user()->roles->role == 'admin')
                            <div class="col-4 text-center">
                                <a href="/category/{{$category->id}}/edit" class="btn btn-secondary">Edit category</a>
                            </div>
                            <div class="col-4 text-center">
                                <form action="{{ route('category.destroy', $category->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" type="submit">DELETE</button>
                                </form>
                            </div>
                        @endif
                        <div class="col-4 text-center">
                            <a href="/posts/create" class="btn btn-primary">Create posts</a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
