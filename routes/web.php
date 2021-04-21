<?php

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

Route::get('/', 'rootController@result');

Route::get('/create', function(){
	return view('create_ext');
});
Route::get('/edit', function(){
	return view('edit_ext');
});

Route::get('/delete', function(){
	return view('delete_ext');
});

Route::get('/upload-bg', function(){
	return view('upload_bg');
});
Route::get('/edit-bg', function(){
	return view('edit_bg');
});
Route::get('/delete-bg', function(){
	return view('delete_bg');
});

Route::get('/create-shortcut', function(){
	return view('create_shortcut');
});

Route::get('/delete-shortcut', function(){
	return view('delete_shortcut');
});

Route::get('/add-game', function(){
	return view('add_game');
});

Route::get('/edit-game', function(){
	return view('edit_game');
});

Route::get('/delete-game', function(){
	return view('delete_game');
});

Route::get('/support', function(){
	return view('support');
});

Route::get('/edit-support', function(){
	return view('edit_support');
});

Route::get('/signup', function(){
	return view('signup');
});

Route::get('/login', function(){
	return view('login');
});
Route::get('/admin', function(){
	return view('login');
});
Route::get('/dashboard', function(){
	return view('dashboard');
});


Route::post('/user/login', 'user_login@result');

Route::post('/user/signup', 'user_signup@result');

Route::get('/user/logout', 'user_logout@result');