@extends('layouts.app')

@section('content')

    <div class="container">

        <h1>Create a User</h1>

        @include('common.errors')

        <form action="{{ url('/user/create') }}" method="POST" class="form-horizontal">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="name">Full name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Full name" maxlength="50" value="{{old('name')}}">
            </div>
            <div class="form-group text-right">
                <button type="submit" class="btn btn-success">Create</button>
            </div>
        </form>
    </div>

@endsection