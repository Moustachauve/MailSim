<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
     * Show a list of all users.
     *
     * @return Response
     */
    public function all()
    {
        return view('userList', ['users' => User::all()]);
    }
}