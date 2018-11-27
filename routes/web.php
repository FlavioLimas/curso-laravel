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

    function opcaoSqlPersonalisado ()
    {
        $sql = 'SELECT * FROM users WHERE id = ?';
        $users = \DB::select($sql, [4]);
        return $users;
    }

    function selecionarTodosDadosTable ()
    {
        return \DB::table('users')
            ->where('id', 4)
            ->select('id', 'name')
            // ->first();
            // ->get();
            ->toSql();
    }

    function retornarTodosUsuariosClasse ()
    {
        // return \App\User::all();
        return \App\User::where('id', 1)
            ->select('id', 'name')
            ->get();
    }

    function inserirDadoNaTabela ()
    {
        $user           = new \App\User();
        $user->name     = 'Flavio Lima';
        $user->email    = 'flaviolima.s@live.com';
        $user->password = bcrypt('123456');
        $user->save();
    }

    function createUserData ($userData)
    {
        $user = new \App\User();
        $user->create($userData);
    }

    function updateUserData ($userData)
    {
        $user = \App\User::find(32);
        $user->update($userData);
    }
    function alterarDadoNaTabela ($id)
    {
        $user           = \App\User::find($id);
        $user->name     = 'Flavio Lima Edited';
        $user->email    = 'flaviolima.s@live.com Edited';
        $user->password = bcrypt('123456');
        $user->save();
    }
    function deletarDadoNaTabela ($id)
    {
        $user = \App\User::find($id);
        $user->delete();
    }
    function deletarDadoOpcao ($ids)
    {
        $user = \App\User::whereIn('id', $ids);
        $user->delete();
    }

    // $users = opcaoSqlPersonalisado();
    // $users = selecionarTodosDadosTable();
    // $users = retornarTodosUsuariosClasse();
    // dd($users);
    // inserirDadoNaTabela();
    // alterarDadoNaTabela(31);

    /*$userData = [
        'name' => 'Usuario Novo Edited',
        'email' => 'email@gmail.com',
        'password' =>bcrypt('123456')
    ];*/
    // createUserData($userData);
    // updateUserData($userData);
    // deletarDadoNaTabela(32);
    // deletarDadoOpcao([28,29]);
    return view('welcome');
});

Route::get('/hello/{name}', function ($name) {
    // return view('hello', ['name' => $name]);
    // compact — Cria um array contendo variáveis e seus valores REF http://php.net/manual/pt_BR/function.compact.php
    return view('hello', compact('name'));
});

// Users
/*Route::get('/users', 'Test\UserController@index');
Route::get('users/{id}', 'Test\UserController@show');
Route::post('/users', 'Test\UserController@save');*/

Route::resource('/users', 'Test\UserController');
Route::resource('products', 'Test\ProductController');