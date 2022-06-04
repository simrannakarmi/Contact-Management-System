<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
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
Auth::routes();

Route::get('/', function () {
    return view('welcome');
});


Route::get('/signup',[UserController::class,'signup']);
Route::post('/signup/store',[UserController::class,'store'])->name('signup.store');

Route::get('/login-view',[UserController::class,'login'])->name('login.view');
Route::post('/login',[UserController::class,'loggedin'])->name('login');

Route::get('/logout',[UserController::class,'logout'])->name('logout');

Route::get('/home',[UserController::class,'home'])->name('home');

//admin
Route::prefix('admin')->middleware('auth','isAdmin')->group(function(){

    Route::get('/home',[UserController::class,'home'])->name('home');
    Route::resource('/contacts', AdminController::class);
});

//Route::

// Route::group(['middleware' => 'auth']. function() {
//     Route::group([
//         'prefix' => 'admin',
//         'middleware' => 'isAdmin',
//         'as' => 'admin.',
//     ], function() {
//         Route::get( uri: 'contacts',
//             [ContactController::class, 'index'])
//             ->name(name:'contacts.index');
//     });

//     Route::group([
//         'prefix' => 'user',
//         'as' => 'user.',
//     ], function() {
//         Route::get(uri:'contacts',
//             [ContactController::class, 'index'])
//         ->name(name:'contact.index');
//     });
// });



// Route::get('/logout', function () {
//     return view('welcome');
// })->name('out');


// Route::get('/contacts/create',[ContactController::class,'create'])->name('contacts.create');
// Route::post('/contacts/store',[ContactController::class,'store'])->name('contacts.store');
// Route::get('/contacts/index',[ContactController::class,'index'])->name('contacts.index');


