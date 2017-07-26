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
    return view('auth.login');
});


Route::get('/display', 'DisplayController@index');

Route::resource('task', 'TasksController');


Route::get('/taskadd', 'TasksController@users');
/*
Route::post('task' , 'TasksController@addTask');

Route::post('taskDel' , 'TasksController@delTask');
*/

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
