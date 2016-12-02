@extends('layouts.app')

@section('content')

    <div class="container">

        <h1>Pick a user</h1>

        <div class="list-group">
            @foreach($users as $user)
                <a href="message/{{$user->id}}" class="list-group-item list-group-item-action">
                    [{{$user->id}}] {{$user->name}}
                </a>
            @endforeach
        </div>
    </div>

@endsection