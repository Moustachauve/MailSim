<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;

class MessageController extends Controller
{
    /**
     * Show a list of all users.
     *
     * @return Response
     */
    public function inbox($userId)
    {
        $user = User::find($userId);

        return view('messageList', [
            'title' => 'Inbox',
            'user' => $user,
            'messages' => $user->receivedMessages
        ]);
    }

    public function read($userId, $messageMetaId) {
        $user = User::find($userId);
        $messageMeta = $user->receivedMessages()->find($messageMetaId);

        return view('messageRead', [
            'user' => $user,
            'messageMeta' => $messageMeta
        ]);
    }
}