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
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                @if ($user)
                    <div class="card-header text-center">Welcom to {{ mb_strtoupper($user->roles->role) }} {{ $user->first_name.' '.$user->last_name }}</div>
                @else
                    <div class="card-header text-center"><h1>Welcom to category blog!</h1></div>
                @endif
                <div class="card-body">
                    <div class="row justify-content-center">
                        <div class="col-6">
                            <table>
                                <thead>
                                    <tr class="text-center">
                                        <th>Categories</th>
                                        @if($user->roles->role == 'admin')
                                            <th>Posts</th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($categories as $category)
                                        <tr>
                                            <td><a href="/category/{{ $category->id }}">{{ $category->title }}</a></td>
                                            @if($user->roles->role == 'admin')
                                                <td class="text-center">{{ $category->posts->count() }}</td>
                                            @endif
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if ($user->roles->role == 'admin')
        <div class="row">
            <div class="col-12 text-center"><a href="/category/create" class="btn btn-success">Create category</a></div>
        </div>
        <div class="row">
            <div class="col-12 text-center"><a href="/posts/create" class="btn btn-primary">Create posts</a></div>
        </div>
    @elseif ($user)
        <div class="row">
            <div class="col-12 text-center"><a href="/posts/create" class="btn btn-primary">Create posts</a></div>
        </div>
    @endif
</div>
@endsection
