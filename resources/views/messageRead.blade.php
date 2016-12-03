@extends('layouts.messageSection')

@section('content.message')

    <h3>{{$message->title}}</h3>
    <p>
        <table class="table">
        <tr>
            <th>From</th>
            <td>{{$message->sender->name}}</td>
        </tr>
        <tr>
            <th>To</th>
            <td>
                @foreach($message->receivers as $receiver)
                    <div>
                        {{$receiver->owner->name}}
                        @if($receiver->isRead)
                            <div class="pull-right empty small">
                                Seen ({{date('M j, Y h:iA', strtotime($receiver->read_at))}})
                            </div>
                        @endif
                    </div>
                @endforeach
            </td>
        </tr>
        <tr>
            <th>Sent</th>
            <td>{{date('F j, Y \a\t h:iA', strtotime($message->created_at))}}</td>
        </tr>

    </table>
    </p>

    <div class="panel panel-default">
        <div class="panel-body">
            @if(empty($message->content))
                <em>This message is empty</em>
            @else
                {{$message->content}}
            @endif
        </div>
    </div>
@endsection