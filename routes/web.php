<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
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
Route::get('/', [LoginController::class, 'home'])->name('home');

//auth
Route::get('/Auth/{Social}',  [LoginController::class, 'redirectToSocial']);
Route::get('/Auth/{Social}/Callback', [LoginController::class, 'handleSocialCallback']);

//add middleware to avoid un-log personal
// Todo
Route::middleware(['auth'])->group(function () {
    Route::get('/Dashboard', [LoginController::class, 'dashboard']);
    Route::any('/Logout', [LogoutController::class, 'logout'])->name('Logout');
    Route::any('/Add', [TodoListController::class, 'add']);
    Route::any('/Delete/{item_id}', [TodoListController::class, 'delete']);
    Route::get('/List', [TodoListController::class, 'list_all']);
    Route::any('/Mark-complete/{item_id}', [TodoListController::class, 'mark_complete']);
});
