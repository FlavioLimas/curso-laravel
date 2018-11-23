<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {

    function opcaoSqlPersonalisado () {
        $sql = 'SELECT * FROM users WHERE id = ?';
        $users = \DB::select($sql, [4]);
        return $users;
    }

    function selecionarTodosDadosTable () {
        return \DB::table('users')
            ->where('id', 4)
            ->select('id', 'name')
            // ->first();
            // ->get();
            ->toSql();
    }

    function retornarTodosUsuariosClasse () {
        // return \App\User::all();
        return \App\User::where('id', 1)
            ->select('id', 'name')
            ->get();
    }

    // $users = opcaoSqlPersonalisado();
    // $users = selecionarTodosDadosTable();
    $users = retornarTodosUsuariosClasse();
    dd($users);
    return view('welcome');
});

Route::get('/hello/{name}', function ($name) {
    // return view('hello', ['name' => $name]);
    // compact — Cria um array contendo variáveis e seus valores REF http://php.net/manual/pt_BR/function.compact.php
    return view('hello', compact('name'));
});
