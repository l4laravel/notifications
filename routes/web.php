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

use App\Notifications\TaskCompleted;
use Illuminate\Support\Facades\Notification;

Route::get('/', function () {

//    two way send mail
//     first way send mail
//    \App\User::find(1)->notify(new \App\Notifications\TaskCompleted());

//    second way mail send
    $user = \App\User::find(1);

    $when = now()->addSecond(10);

    $user->notify((new TaskCompleted($user)));

    // send mail who is not our database

    /*Notification::route('mail', 'nishadhiman@laravel.com')
        ->notify(new TaskCompleted($user));*/

    return view('welcome', compact($user));
});

Route::get('/read',function (){

    Auth::user()->unreadNotifications->markAsRead();
    return redirect()->back();
})->name('read');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
