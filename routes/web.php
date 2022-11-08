<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;


// login user
Route::get('/', function () {
    return view('auth.login');
});
Auth::routes();
Route::get('/redirect', [App\Http\Controllers\HomeController::class, 'Login'])->name('redirect');


//   Admin routs

route::get('/dashboard',[AdminController::class,'dashboard']);
route::get('/users',[AdminController::class,'users']);
route::get('/Create_user',[AdminController::class,'Create_user']);
route::POST('/add_user',[AdminController::class,'add_user']);




