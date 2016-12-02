@extends('layouts.messageSection')

@section('content.message')

    <h3>{{$messageMeta->message->title}}</h3>
    <p>
        <table class="table">
        <tr>
            <th>From</th>
            <td>{{$messageMeta->message->sender->name}}</td>
        </tr>
        <tr>
            <th>To</th>
            <td>
                @foreach($messageMeta->message->receivers as $receiver)
                    <div>{{$receiver->owner->name}}</div>
                @endforeach
            </td>
        </tr>
        <tr>
            <th>Sent</th>
            <td>{{date('F j, Y \a\t h:iA', strtotime($messageMeta->message->date_sent))}}</td>
        </tr>

    </table>
    </p>

    <div class="panel panel-default">
        <div class="panel-body">
            {{$messageMeta->message->content}}
        </div>
    </div>
@endsection