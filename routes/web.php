<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\GorevController;
use App\Http\Middleware\ApiKeyMiddleware;

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

Route::middleware([ApiKeyMiddleware::class])->group(function() {
    Route::get('/v1/user',              [UsersController::class, 'getUser']);
    Route::get('/v1/users',             [UsersController::class, 'getUsers']);

    Route::delete('/v1/user',           [UsersController::class, 'deleteUser']);
    Route::get('/v1/userSelection',     [UsersController::class, 'userSelection']);
    Route::put('/v1/user',              [UsersController::class, 'putUser']);
    Route::post('/v1/user',             [UsersController::class, 'postUser']);

    // Tasks
    Route::get('/v1/tasks',             [GorevController::class, 'getTasks']);
    Route::get('/v1/task',             [GorevController::class, 'getTask']);
    Route::post('/v1/task',             [GorevController::class, 'postTask']);
    Route::delete('/v1/task',             [GorevController::class, 'deleteTask']);
    Route::put('/v1/task',             [GorevController::class, 'putAdminTask']);
    Route::get('/v1/taskSelection',             [GorevController::class, 'taskSelection']);



});
Route::get('/v1/login',             [UsersController::class, 'getLogin']);
Route::put('/v1/task',             [GorevController::class, 'putUserTask']);


