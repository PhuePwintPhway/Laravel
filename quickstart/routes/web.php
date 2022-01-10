<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TasksController;
// use Illuminate\Routing\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

## View List
// Route::get('/', 'TasksController@index');
Route::get('/', [TasksController::class, 'index']);

## Create
Route::get('/tasks', [TasksController::class, 'add']);
Route::post('/tasks', [TasksController::class, 'store']);

## Delete
Route::get('tasks/{id}', [TasksController::class, 'destroy']);
