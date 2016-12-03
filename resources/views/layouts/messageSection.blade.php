
@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-xs-12">
            <h2>
                Welcome, {{$user->name}}

                <a href="/message/{{$user->id}}/new" class="btn btn-primary pull-right">
                    <span class="glyphicon glyphicon-pencil"></span>
                    New Message
                </a>
            </h2>

            <div class="row">
                <div class="col-sm-3">
                    @include('messageMenu')
                </div>
                <div class="col-sm-9">
                    @yield('content.message')
                </div>
            </div>
        </div>
    </div>

@endsection