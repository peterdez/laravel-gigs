<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebController\GigController;


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


Route::get('gigs/my-gigs', [GigController::class, 'GetMyGigs']);

Route::resource('gigs', GigController::class);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Route::get('/gigs/category/{id}', [GigController::class, 'indexcat']);
