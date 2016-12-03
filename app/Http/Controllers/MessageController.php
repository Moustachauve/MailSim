<?php

namespace App\Http\Controllers;

use App\Message;
use App\MessageMeta;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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

        return view('messageInbox', [
            'user' => $user,
            'messages' => $user->receivedMessages()->latest()->get()
        ]);
    }

    public function sentMessages($userId)
    {
        $user = User::find($userId);

        return view('messagesSent', [
            'user' => $user,
            'messages' => $user->sentMessages()->latest()->get()
        ]);
    }

    public function new($userId)
    {
        $user = User::find($userId);
        $listUsers = User::all();

        return view('messageNew', [
            'user' => $user,
            'listUsers' => $listUsers,
        ]);
    }

    public function sendNew(Request $request, $userId)
    {
        $this->validate($request, [
            'title' => 'required|max:100',
            'content' => 'max:5000',
            'receivers' => 'required',
        ]);

        \DB::beginTransaction();
        $user = User::find($userId);

        $message = $user->sentMessages()->create([
            'title' => $request->title,
            'content' => $request->content,
        ]);

        foreach ($request->receivers as $receiverId) {
            $receiver = User::find($receiverId);
            $messageMeta = new MessageMeta();

            $messageMeta->owner()->associate($receiver);
            $messageMeta->message()->associate($message);

            $messageMeta->save();
        }
        \DB::commit();

        return redirect('/message/'.$userId.'/sent');
    }

    public function read($userId, $messageMetaId) {
        $user = User::find($userId);
        $message = $user->receivedMessages()->find($messageMetaId)->message;

        return view('messageRead', [
            'user' => $user,
            'message' => $message
        ]);
    }

    public function readSent($userId, $messageId) {
        $user = User::find($userId);
        $message = $user->sentMessages()->find($messageId);

        return view('messageRead', [
            'user' => $user,
            'message' => $message
        ]);
    }
}