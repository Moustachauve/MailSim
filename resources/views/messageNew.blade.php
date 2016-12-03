@extends('layouts.messageSection')

@section('content.message')

    <h3>New Message</h3>
    @include('common.errors')

    <form action="{{ url('/message/'.$user->id.'/new') }}" method="POST" class="form-horizontal">
        {{ csrf_field() }}

        <div class="form-group">
            <label for="from">From</label>
            <input type="text" class="form-control" id="from" placeholder="from" maxlength="100" value="{{$user->name}}" readonly>
        </div>

        <div class="form-group">
            <label for="title">Subject</label>

            <input type="text" class="form-control" id="title" name="title" placeholder="Subject" maxlength="100" value="{{old('title')}}">
        </div>

        <div class="form-group">
            <label for="name">Send to</label>
            <div class="row">
            @foreach($listUsers as $currentUser)
                <div class="checkbox col-lg-4 col-sm-6 col-xs-12">
                    <label class="checkbox-inline">
                        <input type="checkbox" name="receivers[]" value="{{$currentUser->id}}" {{in_array($currentUser->id,old('receivers', [])) ? 'checked': ''}}>
                        {{$currentUser->name}}
                    </label>
                </div>
            @endforeach
            </div>
        </div>

        <div class="form-group">
            <label for="name">Content</label>
            <textarea class="form-control" name="content" rows="6" maxlength="5000">{{old('content')}}</textarea>
        </div>

        <div class="form-group text-right">
            <button type="submit" class="btn btn-success">
                <span class="glyphicon glyphicon-send"></span>
                Send
            </button>
        </div>
    </form>

@endsection