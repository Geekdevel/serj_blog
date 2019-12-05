@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-center">Welcom to {{ mb_strtoupper($role) }} {{ $user->first_name.' '.$user->last_name }}</div>

                <div class="card-body">
                    <div class="row justify-content-center">
                        @if (!empty($users))
                            <div class="col-md-6 col-12">
                                <table class="text-center">
                                    <thead>
                                        <tr>
                                            <th>First name</th>
                                            <th>Last name</th>
                                            <th>Email</th>
                                            <th>Role</th>
                                            <th>EDIT</th>
                                            <th>DELETE</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $user)
                                            <tr>
                                                <td>{{ $user->first_name }}</td>
                                                <td>{{ $user->last_name }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>{{ $user->roles->role }}</td>
                                                <td><a href="/user/{{ $user->id }}/edit" class="btn btn-primary">EDIT</a></td>
                                                <td>
                                                    <form action="{{ route('user.destroy', $user->id)}}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-danger" type="submit">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <div class="col-md-6 col-12">
                                <table class="text-center">
                                    <thead>
                                        <tr>
                                            <th>First name</th>
                                            <th>Last name</th>
                                            <th>Email</th>
                                            <th>Role</th>
                                            <th>EDIT</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>{{ $user->first_name }}</td>
                                            <td>{{ $user->last_name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->roles->role }}</td>
                                            <td><a href="/user/{{ $user->id }}/edit" class="btn btn-primary">EDIT</a></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        @endif
                        <div class="col-md-6 col-12">
                            <table>
                                <thead>
                                    <tr class="text-center">
                                        <th>Categories</th>
                                        @if ($role == 'admin')
                                        <th>Posts</th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($categories as $category)
                                        <tr>
                                            <td><a href="/category/{{ $category->id }}">{{ $category->title }}</a></td>
                                            @if ($role == 'admin')
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
    @if ($role == 'admin')
        <div class="row justify-content-center">
            <div class="col-12 text-center"><a href="/category/create" class="btn btn-primary">Create category</a></div>
        </div>
    @endif
    <div class="row justify-content-center">
        <div class="col-12 text-center"><a href="/posts/create" class="btn btn-primary">Create posts</a></div>
    </div>
</div>
@endsection
