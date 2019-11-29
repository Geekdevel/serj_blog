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

/*Route::get('/', function () {
    return view('welcome');
});*/
Route::get('/', 'GuestController@index');

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
Route::get('/user', function() {
    $user = Auth::user()->roles;
    $role = $user[0];
    if ($role->role == 'admin'){
        return view('admin.index');
    } elseif ($role->role == 'editor') {
        return view('editor.index');
    } else {
        return view('register');
    }
});
