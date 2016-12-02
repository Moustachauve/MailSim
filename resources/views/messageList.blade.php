@extends('layouts.messageSection')

@section('content.message')

    <h3>{{$title}}</h3>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Subject</th>
                <th>From</th>
                <th>Received</th>
                <th></th>
            </tr>
        </thead>
        <tbody>

        @foreach($messages as $message)
            <tr>
                <td>{{$message->message->title}}</td>
                <td>{{$message->message->sender->name}}</td>
                <td>{{date('M j, Y h:iA', strtotime($message->message->date_sent))}}</td>
                <td>
                    <a href="/message/{{$user->id}}/read/{{$message->id}}">
                        <span class="glyphicon glyphicon-eye-open"></span>
                    </a>
                </td>
            </tr>
        @endforeach

        </tbody>
    </table>

@endsection