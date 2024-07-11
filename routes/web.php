<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TagController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::resource('users', UserController::class);
Route::get("/users/{user}/tags", [UserController::class, 'editTags'])->name('users.editTags');
Route::post("/users/{user}/tags", [UserController::class, 'updateTags'])->name('users.updateTags');
Route::put('/users/{user}/updateTags', [UserController::class, 'updateTags'])->name('users.updateTags');


Route::resource('tags', TagController::class);
