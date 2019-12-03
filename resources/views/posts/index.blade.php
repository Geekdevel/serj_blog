@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                @if (!empty($user))
                    <div class="card-header text-center">Welcom to {{ mb_strtoupper($user->roles->role) }} {{ $user->first_name.' '.$user->last_name }}</div>
                @else
                    <div class="card-header text-center">Welcom to posts blog!</div>
                @endif
                <div class="card-body">
                    <table>
                        <tr>
                            <th>Title</th>
                            <th>Body</th>
                            <th>Image</th>
                            <th>Category</th>
                            <th>Author</th>
                            <th>Meta_keywords</th>
                            <th>Meta_description</th>
                            <th>Created</th>
                            <th>Update</th>
                            @if (!empty($user))
                                <th>EDIT</th>
                                <th>DELETE</th>
                            @endif
                        </tr>
                        @foreach ( $posts as $post)
                            <tr>
                                <td>{{ $post->title }}</td>
                                <td>{{ $post->body }}</td>
                                <td>
                                    <img src="{{ !empty($post->image) ? $post->image : asset('images/NonIzo.png') }}" alt="image" style="width: 150px; height: 150px;">
                                </td>
                                <td>
                                    @if (!empty($post->category))
                                        <a href="/category/{{$post->category->id}}">
                                            {{$post->category->title}}
                                        </a>
                                    @else
                                        Last category
                                    @endif
                                </td>
                                <td>
                                    @if (!empty($post->user))
                                        {{ $post->user->first_name.' '.$post->user->last_name }}
                                    @else
                                        Inkognito
                                    @endif
                                </td>
                                <td>{{ $post->meta_keywords }}</td>
                                <td>{{ $post->meta_description }}</td>
                                <td>{{ $post->created_at }}</td>
                                <td>{{ $post->updated_at }}</td>
                                @if (!empty($user))
                                    <td>
                                        <a href="/posts/{{$post->id}}/edit" class="btn btn-primary">EDIT</a>
                                    </td>
                                    <td>
                                        <form action="{{ route('posts.destroy', $post->id)}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger" type="submit">Delete</button>
                                        </form>
                                    </td>
                                @endif
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
