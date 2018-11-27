<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\User;

class UserController extends Controller
{
    public function index()
    {

        $users = \App\User::all();

        return $users;

    }

    public function show($id)
    {

        $users = User::findOrFail($id);

        return $users;

    }
}
