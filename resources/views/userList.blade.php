@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-xs-12">
             <h1>
                Pick a user

                <a href="/user/create" class="btn btn-success pull-right">
                    <span class="glyphicon glyphicon-plus"></span>
                    Create a user
                </a>
            </h1>

            <div class="list-group">
                @foreach($users as $user)
                    <a href="message/{{$user->id}}" class="list-group-item list-group-item-action">
                        {{$user->name}}
                        @if(count($user->unreadMessages) > 0)
                            <span class="badge progress-bar-info">{{count($user->unreadMessages)}}</span>
                        @endif
                    </a>
                @endforeach
            </div>
        </div>
    </div>

@endsection