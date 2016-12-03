@extends('layouts.messageSection')

@section('content.message')

    <h3>Inbox</h3>

    @if($messages->isEmpty())
        <em>You have no deleted messages.</em>

    @else
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
                <tr class="{{$message->isRead ? '' : 'info' }}">
                    <td>{{$message->message->title}}</td>
                    <td>{{$message->message->sender->name}}</td>
                    <td>{{date('M j, Y h:iA', strtotime($message->message->created_at))}}</td>
                    <td class="text-right">
                        <form action="{{ url('/message/'.$user->id.'/restore/'.$message->id) }}" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}
                            <a href="/message/{{$user->id}}/read/{{$message->id}}" class="btn btn-default" title="Read this message">
                                <span class="glyphicon glyphicon-eye-open"></span>
                            </a>
                            <button type="submit" class="btn btn-default" title="Restore this message">
                                <span class="glyphicon glyphicon-level-up"></span>
                            </button>
                        </form>

                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>
    @endif
@endsection