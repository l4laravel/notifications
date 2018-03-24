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

use Illuminate\Support\Facades\Notification;

Route::get('/', function () {

//    two way send mail
//     first way send mail
//    \App\User::find(1)->notify(new \App\Notifications\TaskCompleted());

//    second way mail send
    $users = \App\User::find(1);
    Notification::send($users, new \App\Notifications\TaskCompleted());

    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
