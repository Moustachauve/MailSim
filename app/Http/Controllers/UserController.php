<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Show a list of all users.
     *
     * @return Response
     */
    public function all()
    {
        return view('userList', ['users' => User::orderBy('name', 'asc')->get()]);
    }

    public function create()
    {
        return view('userCreate');
    }

    public function doCreate(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:users|max:50',
        ]);

        User::create(['name' => $request->name]);

        return redirect('/');
    }
}