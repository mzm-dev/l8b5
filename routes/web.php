<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

//middleware auth in group
Route::middleware(['auth', 'verified'])->group(function () {

    Route::view('/', 'home')->name('home');

    Route::resource('user', UserController::class);
});


Route::get('/profile', [ProfileController::class,'show'])->name('profile.show')->middleware('auth');
Route::get('/profile/edit', [ProfileController::class,'edit'])->name('profile.edit')->middleware('auth');
Route::put('/profile/{profile}', [ProfileController::class,'update'])->name('profile.update')->middleware('auth');
Route::get('/profile/password/change', [ProfileController::class,'password'])->name('profile.password')->middleware('auth');
Route::put('/profile/password/change/{profile}', [ProfileController::class,'update_password'])->name('profile.password.update')->middleware('auth');

