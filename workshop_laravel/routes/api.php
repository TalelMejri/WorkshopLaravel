<?php

use App\Http\Controllers\TodoApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/todos',[TodoApiController::class,'getTodo']);
route::post('/addTodo',[TodoApiController::class,'addTodo']);
route::delete('/deleteTodo/{id}',[TodoApiController::class,'deleteTodo']);
Route::put('/UpdateTodo/{id}', [TodoApiController::class,'UpdateTodo']);
Route::get('/getTodoById/{id}',[TodoApiController::class,'getTodoById']);
