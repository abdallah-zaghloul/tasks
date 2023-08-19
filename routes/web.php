<?php

use App\Http\Controllers\TasksController;
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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group([
    'prefix'=> 'tasks',
    'as'=> 'tasks.',
    'middleware' => ['auth'],
],function (){
    Route::get('/',[TasksController::class,'index'])->name('index');
    Route::get('create',[TasksController::class,'create'])->name('create');
    Route::post('store',[TasksController::class,'store'])->name('store');
    Route::get('show/{id}',[TasksController::class,'show'])->name('show');
    Route::get('edit/{id}',[TasksController::class,'edit'])->name('edit');
    Route::post('update/{id}',[TasksController::class,'update'])->name('update');
    Route::get('delete/{id}',[TasksController::class,'destroy'])->name('destroy');
});
