@extends('layouts.app')

@section('title')
    Users
@endsection

@section('description')
    This page index admin.
@endsection

@section('keywords')
    admin, index, user list.
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 text-center">
                <h1>This Categories list</h1>
                <h4>Welcome {{ auth()->user()->roles->role }} {{ mb_strtoupper(auth()->user()->first_name).' '.mb_strtoupper(auth()->user()->last_name)}}</h4>
            </div>
        </div>

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
                        <div class="btn-group">
                            @if(auth()->user()->roles->role == 'admin')
                                <a href="/category/{{ $category->id }}/edit" class="btn btn-success">EDIT</a>
                                <form action="{{ route('category.destroy', $category->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" type="submit">DELETE</button>
                                </form>
                            @endif
                            <a href="/category/{{ $category->id }}" class="btn btn-primary">SHOW</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="row justify-content-center">
            <div class="col-12 text-center">
                <h5>This users table</h5>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-12 text-center">
                <table width="100%;">
                    <thead>
                        <tr>
                            <th>First name</th>
                            <th>Last name</th>
                            <th>Email</th>
                            <th>EDIT</th>
                            @if ( auth()->user()->roles->role == 'admin')
                                <th>Role</th>
                                <th>DELETE</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->first_name }}</td>
                                <td>{{ $user->last_name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    <a href="/user/{{ $user->id }}/edit" class="btn btn-primary">EDIT</a>
                                </td>
                                @if ( auth()->user()->roles->role == 'admin')
                                    <td>{{ $user->roles->role }}</td>
                                    <td>
                                        <form action="{{ route('user.destroy', $user->id)}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger" type="submit">Delete</button>
                                        </form>
                                    </td>
                                @endif
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
