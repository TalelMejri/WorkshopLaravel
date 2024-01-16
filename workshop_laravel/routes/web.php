<?php

use App\Http\Controllers\TodosController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Routes : POST,GET,PUT,DELETE

Route::get('/', [TodosController::class,'index']);
Route::get('/getByid/{id}', [TodosController::class,'getTodoById'])->name("findbyid");
Route::delete('/deletebyid/{id}', [TodosController::class,'deleteTodo'])->name("deleteTodo");
Route::get('/ShowFormulaire', [TodosController::class,'ShowFormulaire'])->name("ShowFormulaire");
Route::post('/addTodo', [TodosController::class,'AddTodo'])->name("AddTodo");
Route::get('/ShowUpdateForm/{id}', [TodosController::class,'ShowUpdateForm'])->name("ShowUpdateForm");
Route::put('/UpdateTodo', [TodosController::class,'UpdateTodo'])->name("UpdateTodo");





