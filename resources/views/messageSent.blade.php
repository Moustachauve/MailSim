@extends('layouts.messageSection')

@section('content.message')

    <h3>Sent</h3>

    @if($messages->isEmpty())
        <em>You have not sent any messages.</em>

    @else
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Subject</th>
                    <th>From</th>
                    <th>Date</th>
                    <th class="text-center">Seen by</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
            @foreach($messages as $message)

                <tr>
                    <td>{{$message->title}}</td>
                    <td>{{$message->sender->name}}</td>
                    <td>{{date('M j, Y h:iA', strtotime($message->created_at))}}</td>
                    <td class="text-center">
                        {{count($message->seenBy)}} / {{count($message->receivers)}}
                    </td>
                    <td class="text-right">
                        <a href="/message/{{$user->id}}/sent/{{$message->id}}/read" class="btn btn-default">
                            <span class="glyphicon glyphicon-eye-open"></span>
                        </a>
                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>
    @endif

@endsection