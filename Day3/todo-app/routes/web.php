<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TasksController;

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

Route::post('/tasks', [TasksController::class, 'create']);

Route::delete('/tasks/{id}', [TasksController::class, 'delete']);

Route::get('/tasks', [TasksController::class, 'get']);

Route::patch('/tasks/{id}', [TasksController::class, 'update']);
