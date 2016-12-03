
<h3>Folders</h3>

<div class="list-group">
    <a href="/message/{{$user->id}}" class="list-group-item list-group-item-action">
        <span class=" glyphicon glyphicon-envelope"></span>
        Inbox
        @if(count($user->unreadMessages) > 0)
            <span class="badge progress-bar-info">{{count($user->unreadMessages)}}</span>
        @endif
    </a>
    <a href="/message/{{$user->id}}/sent" class="list-group-item list-group-item-action">
        <span class=" glyphicon glyphicon-log-out"></span>
        Sent
    </a>
    <a href="/message/{{$user->id}}/deleted" class="list-group-item list-group-item-action">
        <span class="glyphicon glyphicon-trash"></span>
        Trash
        @if(count($user->unreadDeletedMessages) > 0)
            <span class="badge progress-bar-info">{{count($user->unreadDeletedMessages)}}</span>
        @endif
    </a>
</div>
