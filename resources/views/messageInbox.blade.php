@extends('layouts.messageSection')

@section('content.message')

    <h3>Inbox</h3>

    @if($messages->isEmpty())
        <em>Your inbox is empty.</em>

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
                            <form action="{{ url('/message/'.$user->id.'/delete/'.$message->id) }}" method="POST">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <a href="/message/{{$user->id}}/read/{{$message->id}}" class="btn btn-default" title="Read this message">
                                    <span class="glyphicon glyphicon-eye-open"></span>
                                </a>
                                <button type="submit" class="btn btn-danger" title="Delete this message" onclick="return confirmDelete()">
                                    <span class="glyphicon glyphicon-trash"></span>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    @endif

    <script>

        function confirmDelete() {
            return confirm('Do you really want to delete this message?');
        }

    </script>

@endsection