<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User;

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

Route::post('/user', [User::class, 'create']);

Route::delete('/user/{id}', [User::class, 'delete']);

Route::get('/user', [User::class, 'get']);

Route::get('/user/{id}', [User::class, 'get']);
