<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\TodoListController;
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

// login
Route::get('/', [LoginController::class,'home']);

//add middleware to avoid un-log personal
// Todo
Route::any('/Add', [TodoListController::class,'add']);
Route::any('/Delete/{item_id}', [TodoListController::class,'delete']);
Route::get('/List', [TodoListController::class,'list_all']);
Route::any('/Mark-complete/{item_id}', [TodoListController::class,'mark_complete']);
