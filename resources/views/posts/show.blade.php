@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                @if (!empty($user))
                    <div class="card-header text-center">Welcome to {{ mb_strtoupper($user->roles->role) }} {{ $user->first_name.' '.$user->last_name }}</div>
                @else
                    <div class="card-header text-center">Welcome to post!</div>
                @endif
                <h3>
                    Category:
                    <a href="
                        @if (!empty($post->category))
                        /category/{{$post->category_id}}
                        @else
                        #
                        @endif
                        ">
                        {{ !empty($post->category->title) ? $post->category->title : 'Last category.' }}
                    </a>
                </h3>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 text-center">
                            <h2>{{ $post->title }}</h2>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 text-center">
                            <img src="{{ $post->image ? '/storage/'.$post->image : asset('images/NonIzo.png') }}" alt="{{ $post->title}}" height="300px">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            {!! $post->body !!}
                        </div>
                    </div>

                   {{--  <div class="row">
                        <div class="col-12">
                            <p style="text-align: justify;">{{ htmlspecialchars_decode($post->meta_keywords) }}</p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <p style="text-align: justify;">{{ htmlspecialchars_decode($post->meta_description) }}</p>
                        </div>
                    </div> --}}

                    <div class="row">
                        <div class="col-12">
                            <p style="text-align: center;"> Author: {{ !empty($post->user) ? $post->user->first_name.' '.$post->user->last_name : 'Incognito.' }}</p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <p style="text-align: center;"> Created: {{ $post->created_at }}; Updated; {{ $post->updated_at }}</p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <p style="text-align: center;"> Tags:
                                @if (!empty($post->tags))
                                    @foreach ($post->tags as $tag)
                                    <?= ' '.$tag->title.' ' ?>
                                    @endforeach
                                @endif
                            </p>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-6 text-center">
                            <a href="#" id="add_tag" class="btn btn-primary">ADD TAG</a>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    @if (!empty($user))
                    <div class="row justify-content-center">
                        <div class="col-6 text-center">
                            <a href="{{ route('posts.edit', $post->id)}}" class="btn btn-primary">EDIT</a>
                        </div>
                        <div class="col-6 text-center">
                            <form action="{{ route('posts.destroy', $post->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit">Delete</button>
                            </form>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
