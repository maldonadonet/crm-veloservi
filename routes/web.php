<?php

Route::get('/', function () {
    return view('auth.login');
    
});

Route::resource('usuarios', 'UsersController');
Route::resource('pedidos', 'PedidosController');
Route::resource('pedidos-especiales', 'PedidosEspController');
Route::resource('productos', 'ProductosController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


