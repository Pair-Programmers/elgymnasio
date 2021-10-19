<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MemberAdminController;
use App\Http\Controllers\ServiceAdminController;
use App\Http\Controllers\PackageAdminController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\PaymentController;
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

Route::get('/login', [AdminController::class, 'showLogin'])->name('login_form');
Route::Post('/do_login', [LoginController::class, 'doLogin'])->name('do_login');

Route::middleware('auth')->group(function(){

    Route::get('/admin', [AdminController::class, 'index']);
    Route::get('/do_logout', [LoginController::class, 'doLogout'])->name('do_logout');

    Route::get('/member_register', [MemberAdminController::class, 'showCreate']);
    Route::post('/update_member', [MemberAdminController::class, 'update']);
    Route::get('/display_edit_member/{id}', [MemberAdminController::class, 'showEditPage']);
    Route::get('/member_list/{query}', [MemberAdminController::class, 'showList']);
    Route::post('/save_member', [MemberAdminController::class, 'store']);
    Route::get('/delete_member/{id}', [MemberAdminController::class, 'destroy']);
    Route::get('/display_invoice_member/{id}', [MemberAdminController::class, 'showRegistrationInvoice']);
    Route::get('/invoice_print/{id}', [MemberAdminController::class, 'showRegistrationInvoicePrint']);

    Route::get('/display_add_service', [ServiceAdminController::class, 'showAddServicePage']);
    Route::post('/update_service', [ServiceAdminController::class, 'update']);
    Route::get('/display_edit_service/{id}', [ServiceAdminController::class, 'showEditServicePage']);
    Route::get('/display_list_service', [ServiceAdminController::class, 'showServiceListPage']);
    Route::post('/save_service', [ServiceAdminController::class, 'store']);
    Route::get('/delete_service/{id}', [ServiceAdminController::class, 'destroy']);

    Route::get('/display_add_package', [PackageAdminController::class, 'showAddPackagePage']);
    Route::post('/update_package', [PackageAdminController::class, 'update']);
    Route::get('/display_edit_package/{id}', [PackageAdminController::class, 'showEditPackagePage']);
    Route::get('/display_list_package', [PackageAdminController::class, 'showPackageListPage']);
    Route::post('/save_package', [PackageAdminController::class, 'store']);
    Route::get('/delete_package/{id}', [PackageAdminController::class, 'destroy']);

    Route::get('/display_add_expense', [ExpenseController::class, 'showAddPage']);
    Route::get('/display_edit_expense/{id}', [ExpenseController::class, 'showEditPage']);
    Route::get('/display_list_expense', [ExpenseController::class, 'showListPage']);
    Route::get('/display_list_expense_categories', [ExpenseController::class, 'showCategoryListPage']);
    Route::post('/save_expense', [ExpenseController::class, 'store']);
    Route::get('/delete_expense/{id}', [ExpenseController::class, 'destroy']);
    Route::post('/update_expense', [ExpenseController::class, 'update']);
    //Expense Category
    Route::get('/display_expense_category', [ExpenseController::class, 'showCategoryPage']);
    Route::post('/save_exp_category', [ExpenseController::class, 'store_category']);
    Route::get('/display_edit_exp_category/{id}', [ExpenseController::class, 'showEditCategoryPage']);
    Route::post('/update_exp_category', [ExpenseController::class, 'update_category']);
    Route::get('/delete_exp_category/{id}', [ExpenseController::class, 'destroy_category']);
    //Expense SubCategory
    Route::get('/display_expense_subcategory', [ExpenseController::class, 'showSubCategoryPage']);
    Route::post('/save_exp_subcategory', [ExpenseController::class, 'store_subcategory']);
    Route::get('/display_edit_exp_subcategory/{id}', [ExpenseController::class, 'showEditSubCategoryPage']);
    Route::post('/update_exp_subcategory', [ExpenseController::class, 'update_subcategory']);
    Route::get('/delete_exp_subcategory/{id}', [ExpenseController::class, 'destroy_subcategory']);


    Route::get('/display_vendor_create', [VendorController::class, 'showCreatePage']);
    Route::get('/display_vendor_edit/{id}', [VendorController::class, 'showEditPage']);
    Route::get('/display_vendor_list', [VendorController::class, 'showListPage']);
    Route::post('/save_vendor', [VendorController::class, 'store']);
    Route::get('/delete_vendor/{id}', [VendorController::class, 'destroy']);
    Route::post('/update_vendor', [VendorController::class, 'update']);



    Route::get('/display_employee_create', [EmployeeController::class, 'showCreatePage']);
    Route::get('/display_employee_edit/{id}', [EmployeeController::class, 'showEditPage']);
    Route::get('/display_employee_list', [EmployeeController::class, 'showListPage']);
    Route::post('/save_employee', [EmployeeController::class, 'store']);
    Route::get('/delete_employee/{id}', [EmployeeController::class, 'destroy']);
    Route::post('/update_employee', [EmployeeController::class, 'update']);

    Route::get('/display_account_create', [AccountController::class, 'showCreatePage']);
    Route::get('/display_account_edit/{id}', [AccountController::class, 'showEditPage']);
    Route::get('/display_account_list', [AccountController::class, 'showListPage']);
    Route::post('/save_account', [AccountController::class, 'store']);
    Route::get('/delete_account/{id}', [AccountController::class, 'destroy']);
    Route::post('/update_account', [AccountController::class, 'update']);

    //payments
    Route::get('/display_payment_create/{id}', [PaymentController::class, 'showCreatePage']);
    Route::get('/display_payment_collect_fee/{id}', [PaymentController::class, 'showCollectFeeInvoicePage'])->name('payment_show_fee_invoice');
    Route::get('/display_payment_edit/{id}', [PaymentController::class, 'showEditPage']);
    Route::get('/display_payment_list', [PaymentController::class, 'showListPage']);
    Route::post('/display_payment_list', [PaymentController::class, 'showMonthlySearchListPage'])->name('payment.show_search_list');
    Route::post('/save_payment', [PaymentController::class, 'store'])->name('payment.store');
    Route::get('/delete_payment/{id}', [PaymentController::class, 'destroy']);
    Route::post('/update_payment', [PaymentController::class, 'update']);
    Route::get('/payment_invoice_print/{id}', [PaymentController::class, 'showCollectFeeInvoicePrintPage']);

});
