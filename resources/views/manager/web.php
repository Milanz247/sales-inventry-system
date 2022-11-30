<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ManagerController;



// login user
Route::get('/', function () {
    return view('auth.login');
});
Auth::routes();

Route::get('/redirect', [App\Http\Controllers\HomeController::class, 'Login'])->name('redirect');

                           // admin routes

//admin dashboard
route::get('/admin-dashboard',[AdminController::class,'admin_dashboard']);
// route::get('/cashier-dashboard',[AdminController::class,'cashier_dashboard']);

                           // user managment
route::get('/view-users',[AdminController::class,'view_admin_users']);
route::get('/add-new-user-form',[AdminController::class,'add_new_user_form']);
route::post('/save-user-to-database',[AdminController::class,'save_user_to_database']);
route::get('/delete-user/{id}',[AdminController::class,'delete_user']);
route::get('/update-user-form/{id}',[AdminController::class,'update_user_form']);
route::post('/update-user-save/{id}',[AdminController::class,'update_user_save']);
route::get('/search-user',[AdminController::class,'search_user']);

                           // stock managment
//catagory routes
route::get('/admin-view-catagory',[AdminController::class,'admin_view_catagory']);
route::post('/admin-add-catagory',[AdminController::class,'admin_add_catagory']);
route::get('/admin-delete-catagory/{id}',[AdminController::class,'admin_delete_catagory']);

// items routs
route::get('/admin-view-items',[AdminController::class,'admin_view_items']);
route::get('/admin-delete-items/{id}',[AdminController::class,'admin_delete_items']);
route::get('/admin-view-add-new-item-form',[AdminController::class,'admin_view_add_new_item_form']);
route::post('/admin-add-item-to-database',[AdminController::class,'admin_add_item_to_database']);
route::get('admin-view-update-form/{id}',[AdminController::class,'admin_view_update_form']);
route::post('/admin-update-item-save-database/{id}',[AdminController::class,'admin_update_item_save_database']);
route::get('/admin-search-items',[AdminController::class,'admin_search_item']);

                          // supplier managment
route::get('/admin-view-supplier',[AdminController::class,'admin_view_supplier']);
route::get('/admin-view-add-supplier-form',[AdminController::class,'admin_view_add_supplier_form']);
route::POST('/admin-add-supplier-to-database',[AdminController::class,'admin_add_supplier_to_database']);
route::get('/admin-view-update-supplier-form/{id}',[AdminController::class,'admin_view_update_supplier_form']);
route::post('/admin-save-update-supplier-to-database/{id}',[AdminController::class,'admin_save_update_supplier_to_database']);
route::get('/admin-delete-supplier/{id}',[AdminController::class,'admin_delete_supplier']);
route::get('/admin-search-supplier',[AdminController::class,'admin_search_supplier']);





                               // manager routs
//manager dashboard
route::get('/manager-dashboard',[ManagerController::class,'manager_dashboard']);



                              // stock managment
//catagory routes
route::get('/manager-view-catagory',[ManagerController::class,'manager_view_catagory']);
route::post('/manager-add-catagory',[ManagerController::class,'manager_add_catagory']);
route::get('/manager-delete-catagory/{id}',[ManagerController::class,'manager_delete_catagory']);

// items routs
route::get('/manager-view-items',[ManagerController::class,'manager_view_items']);
route::get('/manager-delete-items/{id}',[ManagerController::class,'manager_delete_items']);
route::get('/manager-view-add-new-item-form',[ManagerController::class,'manager_view_add_new_item_form']);
route::post('/manager-add-item-to-database',[ManagerController::class,'manager_add_item_to_database']);
route::get('manager-view-update-form/{id}',[ManagerController::class,'manager_view_update_form']);
route::post('/manager-update-item-save-database/{id}',[ManagerController::class,'manager_update_item_save_database']);
route::get('/manager-search-items',[ManagerController::class,'manager_search_item']);


                              // Supplier managmet

route::get('/manager-view-supplier',[AdminController::class,'admin_view_supplier']);
route::get('/manager-view-add-supplier-form',[AdminController::class,'admin_view_add_supplier_form']);
route::POST('/manager-add-supplier-to-database',[AdminController::class,'admin_add_supplier_to_database']);
route::get('/manager-view-update-supplier-form/{id}',[AdminController::class,'admin_view_update_supplier_form']);
route::post('/manager-save-update-supplier-to-database/{id}',[AdminController::class,'admin_save_update_supplier_to_database']);
route::get('/manager-delete-supplier/{id}',[AdminController::class,'admin_delete_supplier']);
route::get('/manager-search-supplier',[AdminController::class,'admin_search_supplier']);

























//        route::get('/supplier',[AdminController::class,'supplier']);
//      route::get('/view-supplier',[AdminController::class,'viewsuppliers']);
// route::POST('/add-Supplier',[AdminController::class,'addSupplier']);
//       route::get('/delete_supplier/{id}',[AdminController::class,'deletesupplier']);
//            route::get('/update_supplier/{id}',[AdminController::class,'updatesupplier']);
//           route::post('/update_suppliertodatabase/{id}',[AdminController::class,'updatesuppliertodatabase']);











































