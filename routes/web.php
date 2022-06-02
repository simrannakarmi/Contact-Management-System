<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\LoginController;


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

Route::get('/signup',[UserController::class,'signup']);
Route::post('/signup/store',[UserController::class,'store'])->name('signup.store');

Route::get('/login-view',[UserController::class,'login'])->name('login.view');
Route::post('/login',[UserController::class,'loggedin'])->name('login');

Route::get('/logout',[UserController::class,'logout'])->name('logout');

Route::get('/home',[UserController::class,'home'])->name('home');

// Route::get('/contacts/create',[ContactController::class,'create'])->name('contacts.create');
// Route::post('/contacts/store',[ContactController::class,'store'])->name('contacts.store');
// Route::get('/contacts/index',[ContactController::class,'index'])->name('contacts.index');


Route::resource('/contacts', ContactController::class);

