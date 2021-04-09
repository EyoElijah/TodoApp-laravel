<?php

namespace App\Http\Controllers;
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
    return view('welcome');
});
// index route
Route::get('/todos', [TodosController::class, 'index'])->name('index');
// show route
Route::get('/todos/{todo}', [TodosController::class, 'show']);
// create route
Route::get('/new-todo', [TodosController::class, 'create'])->name('create');
// store todos
Route::post('/store-todos', [TodosController::class, 'store'])->name('store');
// edit route
Route::get('/todos/{todo}/edit', [TodosController::class, 'edit'])->name('edit');
// update route
Route::post('/todos/{todo}/update-todos', [TodosController::class, 'update'])->name('update');
// delete route
Route::get('/todos/{todo}/delete', [TodosController::class, 'destroy'])->name('delete');
// completed route
Route::get('/todos/{todo}/complete', [TodosController::class, 'complete'])->name('complete');



