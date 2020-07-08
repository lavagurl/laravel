<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::resource('users', 'Admin\UserController');
Route::get('/users/{user}/showForm', 'Admin\UserController@showForm')->name('users.showForm');
Route::post('/users/{user}/edit', 'Admin\UserController@edit')->name('users.edit.up');

Route::get('/admin/donors/showForm', 'Admin\DonorController@showForm')->name('admin.donors.showForm');
Route::post('/admin/donors/create', 'Admin\DonorController@create')->name('admin.donors.create');

Route::resource('messages', 'MessageController');
Route::post('/messages/create/{user}', 'MessageController@create')->name('messages.create');

Route::namespace('Admin')->prefix('admin')->name('admin.')->group(function(){
    Route::resource('users', 'UserController');
    Route::resource('donors', 'DonorController');
});

//Route::get('/messages', 'ConversationController@index')->name('messages');




