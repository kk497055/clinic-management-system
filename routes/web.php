<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\Setup\ServiceController;
use App\Http\Controllers\Backend\Setup\ServiceFeeCategoryController;
use App\Http\Controllers\Backend\Setup\ServiceFeeAmountController;


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
    return view('auth.login');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('admin.index');
})->name('dashboard');

Route::get('/admin/logout', [AdminController::class, 'Logout'])->name('admin.logout');

// User Management Complete Routing

Route::prefix('users')->group(function(){

    Route::get('/view', [UserController::class, 'UserView'])->name('user.view');
    Route::get('/add', [UserController::class, 'UserAdd'])->name('user.add');
    Route::post('/store', [UserController::class, 'UserStore'])->name('user.store');
    Route::get('/edit/{id}', [UserController::class, 'UserEdit'])->name('user.edit');
    Route::post('/update/{id}', [UserController::class, 'UserUpdate'])->name('user.update');
    Route::get('/delete/{id}', [UserController::class, 'UserDelete'])->name('user.delete');

});

//User Profile Management

Route::prefix('profile')->group(function(){

    Route::get('/view', [ProfileController::class, 'ProfileView'])->name('profile.view');
    Route::get('/edit', [ProfileController::class, 'ProfileEdit'])->name('profile.edit');
    Route::post('/store', [ProfileController::class, 'ProfileStore'])->name('profile.store');
    Route::get('/password/view', [ProfileController::class, 'PasswordView'])->name('password.view');
    
    

});

// Setup Management

Route::prefix('setup')->group(function(){

    Route::get('/services/view', [ServiceController::class, 'ServiceView'])->name('services.view');
    Route::get('/services/add', [ServiceController::class, 'ServiceAdd'])->name('services.add');
    Route::post('/services/store', [ServiceController::class, 'ServiceStore'])->name('services.store');
    Route::get('/services/edit/{id}', [ServiceController::class, 'ServiceEdit'])->name('services.edit');
    Route::post('/services/update/{id}', [ServiceController::class, 'ServiceUpdate'])->name('services.update');
    Route::get('/services/delete/{id}', [ServiceController::class, 'ServiceDelete'])->name('services.delete');
    
    
// service fee category

Route::get('/services/fee/category/view', [ServiceFeeCategoryController::class, 'ServiceFeeCategoryView'])->name('servicesfeecategory.view');
Route::get('/services/fee/category/add', [ServiceFeeCategoryController::class, 'ServiceFeeCategoryAdd'])->name('servicesfeecategory.add');
Route::post('/services/fee/category/store', [ServiceFeeCategoryController::class, 'ServiceFeeCategoryStore'])->name('servicesfeecategory.store');  
Route::get('/services/fee/category/edit/{id}', [ServiceFeeCategoryController::class, 'ServiceFeeCategoryEdit'])->name('servicesfeecategory.edit');  
Route::post('/services/fee/category/update/{id}', [ServiceFeeCategoryController::class, 'ServiceFeeCategoryUpdate'])->name('servicesfeecategory.update');  
Route::get('/services/fee/category/delete/{id}', [ServiceFeeCategoryController::class, 'ServiceFeeCategoryDelete'])->name('servicesfeecategory.delete');  

// service fee amount

Route::get('/services/fee/amount/view', [ServiceFeeAmountController::class, 'ServiceFeeAmountView'])->name('servicesfeeamount.view');
Route::get('/services/fee/amount/add', [ServiceFeeAmountController::class, 'ServiceFeeAmountAdd'])->name('servicesfeeamount.add');
Route::post('/services/fee/amount/store', [ServiceFeeAmountController::class, 'ServiceFeeAmountStore'])->name('servicesfeeamount.store');
Route::get('/services/fee/amount/edit/{service_category_id}', [ServiceFeeAmountController::class, 'ServiceFeeAmountEdit'])->name('servicesfeeamount.edit');
Route::post('/services/fee/amount/update/{service_category_id}', [ServiceFeeAmountController::class, 'ServiceFeeAmountUpdate'])->name('servicesfeeamount.update');
Route::get('/services/fee/amount/details/{service_category_id}', [ServiceFeeAmountController::class, 'ServiceFeeAmountDetail'])->name('servicesfeeamount.detail');

});