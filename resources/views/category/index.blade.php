@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                @if (!empty($user))
                    <div class="card-header text-center">Welcom to {{ mb_strtoupper($user->roles->role) }} {{ $user->first_name.' '.$user->last_name }}</div>
                @else
                    <div class="card-header text-center">Welcom to category blog!</div>
                @endif
                <div class="card-body">
                    <div class="row justify-content-center">
                        <div class="col-12">
                            <table>
                                <tr class="text-center">
                                    <th>Categories</th>
                                    <th>Posts</th>
                                </tr>
                                @foreach ($categories as $category)
                                    <tr>
                                        <td><a href="/category/{{ $category->id }}">{{ $category->title }}</a></td>
                                        <td class="text-center">{{ $category->posts->count() }}</td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if (!empty($user->roles->role) && $user->roles->role == 'admin')
        <div class="row">
            <div class="col-12 text-center"><a href="/category/create" class="btn btn-success">Create category</a></div>
        </div>
        <div class="row">
            <div class="col-12 text-center"><a href="/posts/create" class="btn btn-primary">Create posts</a></div>
        </div>
    @elseif (!empty($user))
        <div class="row">
            <div class="col-12 text-center"><a href="/posts/create" class="btn btn-primary">Create posts</a></div>
        </div>
    @endif
</div>
@endsection
