<?php

namespace App\Http\Controllers\Test;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \App\User;

class UserController extends Controller
{
    public function index()
    {

        $users = \App\User::all();

        return $users;

    }

    public function show($id, $request)
    {

        // $users = User::findOrFail($id);

        // return $users;

        $nome = $request->query('name');
        print $nome;

        return response('Hello Wold', 200)
            ->withHeaders(['Content-Type' => 'text/plain']); // Declarando headers num array
            // ->header('Content-Type', 'text/plain')
            // ->header('Content-Type', 'application/json');

    }
}
