<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\RecieptController;
use App\Http\Controllers\CashierController;







// login user
Route::get('/', function () {
    return view('auth.login');
});
Auth::routes();
Route::get('/redirect', [App\Http\Controllers\HomeController::class, 'Login'])->name('redirect');


                           // admin routes
//admin dashboard
route::get('/admin-dashboard',[AdminController::class,'admin_dashboard']);

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

// //billing
route::get('/admin-view-billing',[AdminController::class,'admin_view_billing']);
route::get('/admin-getPrice/{id}',[AdminController::class,'admin_getPrice']);
route::POST('/admin-add-item-to-bill',[AdminController::class,'admin_add_item_to_bill']);
route::get('/admin-view-process-bill',[AdminController::class,'admin_view_process_bill']);
route::POST('/admin-save-billhistory',[AdminController::class,'admin_save_billhistory']);
route::get('/admin-processing-bill-button',[AdminController::class,'admin_processing_billbutton']);
route::get('/admin-delete-processbill-row-item/{id}',[AdminController::class,'admin_delete_processbill_row_item']);

//sales report
route::get('/admin-view-sales-report',[AdminController::class,'admin_view_sales_report']);
route::get('/admin-delete-invoice-histry-row/{id}',[AdminController::class,'admin_delete_invoice_histry_row']);
route::get('/admin-filter-date-range',[AdminController::class,'admin_filter_date_range']);

                        //    GRN
route::get('/admin-view-grn',[AdminController::class,'admin_view_grn']);



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

route::get('/manager-view-supplier',[ManagerController::class,'manager_view_supplier']);
route::get('/manager-view-add-supplier-form',[ManagerController::class,'manager_view_add_supplier_form']);
route::POST('/manager-add-supplier-to-database',[ManagerController::class,'manager_add_supplier_to_database']);
route::get('/manager-view-update-supplier-form/{id}',[ManagerController::class,'manager_view_update_supplier_form']);
route::post('/manager-save-update-supplier-to-database/{id}',[ManagerController::class,'manager_save_update_supplier_to_database']);
route::get('/manager-delete-supplier/{id}',[ManagerController::class,'manager_delete_supplier']);
route::get('/manager-search-supplier',[ManagerController::class,'manager_search_supplier']);

// billing
route::get('/manager-view-billing',[ManagerController::class,'manager_view_billing']);
route::get('/manager-getPrice/{id}',[ManagerController::class,'manager_getPrice']);
route::POST('/manager-add-item-to-bill',[ManagerController::class,'manager_add_item_to_bill']);
route::get('/manager-view-process-bill',[ManagerController::class,'manager_view_process_bill']);
route::POST('/manager-save-billhistory',[ManagerController::class,'manager_save_billhistory']);
route::get('/manager-processing-bill-button',[ManagerController::class,'manager_processing_billbutton']);
route::get('/manager-delete-processbill-row-item/{id}',[ManagerController::class,'manager_delete_processbill_row_item']);

//sales report
route::get('/manager-view-sales-report',[ManagerController::class,'manager_view_sales_report']);
route::get('/manager-delete-invoice-histry-row/{id}',[ManagerController::class,'manager_delete_invoice_histry_row']);
route::get('/manager-filter-date-range',[ManagerController::class,'manager_filter_date_range']);



                          // cashier routes
route::get('/cashier-dashboard',[CashierController::class,'cashier_dashboard']);


// billing
route::get('/cashier-view-billing',[CashierController::class,'cashier_view_billing']);
route::get('/cashier-getPrice/{id}',[CashierController::class,'cashier_getPrice']);
route::POST('/cashier-add-item-to-bill',[CashierController::class,'cashier_add_item_to_bill']);
route::get('/cashier-view-process-bill',[CashierController::class,'cashier_view_process_bill']);
route::POST('/cashier-save-billhistory',[CashierController::class,'cashier_save_billhistory']);
route::get('/cashier-processing-bill-button',[CashierController::class,'cashier_processing_billbutton']);
route::get('/cashier-delete-processbill-row-item/{id}',[CashierController::class,'cashier_delete_processbill_row_item']);


//sales report
route::get('/cashier-view-sales-report',[CashierController::class,'cashier_view_sales_report']);
route::get('/cashier-delete-invoice-histry-row/{id}',[CashierController::class,'cashier_delete_invoice_histry_row']);
route::get('/cashier-filter-date-range',[CashierController::class,'cashier_filter_date_range']);



