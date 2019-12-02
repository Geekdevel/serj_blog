@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-center">Welcom to ADMIN {{ $user->first_name.' '.$user->last_name }}</div>

                <div class="card-body">
                    <div class="row justify-content-center">
                        @if (!empty($users))
                            <div class="col-md-6">
                                <table class="text-center">
                                    <tr>
                                        <th>First name</th>
                                        <th>Last name</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th>EDIT</th>
                                    </tr>
                                    @foreach ($users as $user)
                                        <tr>
                                            <td>{{ $user->first_name }}</td>
                                            <td>{{ $user->last_name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->roles->role }}</td>
                                            <td><a href="#/{{ $user->id }}">EDIT</a></td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                        @endif
                        <div class="col-md-6">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
