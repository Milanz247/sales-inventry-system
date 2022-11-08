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
route::get('/delete_user/{id}',[AdminController::class,'deleteuser']);
route::get('/user_serach',[AdminController::class,'user_serach']);
//   Admin category
route::get('/view_catagory',[AdminController::class,'view_catagory']);
route::post('/add_catagory',[AdminController::class,'add_catagory']);
route::get('/delete_catagory/{id}',[AdminController::class,'delete_catagory']);


route::get('/view_item',[AdminController::class,'view_item']);











