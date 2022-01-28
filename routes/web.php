<?php

use App\Http\Controllers\TodoController;
use App\Http\Controllers\TodolistController;
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

Route::get('/', function () {
    return redirect()->route('todolists.index');
});

Auth::routes();


Route::prefix('todolists')->name('todolists.')->group(function () {
    Route::get('', [TodolistController::class, 'index'])->name('index');
    Route::post('', [TodolistController::class, 'store'])->name('store');
    Route::get('{user}/edit', [TodolistController::class, 'edit'])->name('edit');
    Route::put('{user}', [TodolistController::class, 'update'])->name('update');
    Route::delete('{user}', [TodolistController::class, 'destroy'])->name('destroy');
});

Route::prefix('todo')->name('todo.')->group(function () {
    Route::get('{todolist}', [TodoController::class, 'index'])->name('index');
    Route::post('{todolist}', [TodoController::class, 'store'])->name('store');
    Route::get('{user}/edit', [TodoController::class, 'edit'])->name('edit');
    Route::put('{todo}', [TodoController::class, 'update'])->name('update');
    Route::delete('{user}', [TodoController::class, 'destroy'])->name('destroy');
});
