<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\Setup\ServiceController;
use App\Http\Controllers\Backend\Setup\ServiceFeeCategoryController;
use App\Http\Controllers\Backend\Setup\ServiceFeeAmountController;
use App\Http\Controllers\Backend\Setup\InventoryController;
use App\Http\Controllers\Backend\Setup\SupplierController;
use App\Http\Controllers\Backend\Setup\EmployeeController;
use App\Http\Controllers\Backend\Setup\EmployeeSalaryController;
use App\Http\Controllers\Backend\Setup\BranchController;
use App\Http\Controllers\Backend\Operations\EmployeeTransferController;
use App\Http\Controllers\Backend\Operations\PatientController;
use App\Http\Controllers\Backend\Operations\AppointmentController;


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

//inventory

Route::get('/inventory/items/view', [InventoryController::class, 'InventoryView'])->name('inventory.view');
Route::get('/inventory/items/edit/{id}', [InventoryController::class, 'InventoryEdit'])->name('inventory.edit');
Route::get('/inventory/items/add', [InventoryController::class, 'InventoryAdd'])->name('inventory.add');
Route::get('/inventory/items/purchase', [InventoryController::class, 'InventoryPurchase'])->name('inventory.purchase');
Route::post('/inventory/items/purchase/store', [InventoryController::class, 'InventoryPurchaseStore'])->name('inventorypurchase.store');
Route::post('/inventory/items/store', [InventoryController::class, 'Inventorystore'])->name('inventory.store');
Route::post('/inventory/items/update/{id}', [InventoryController::class, 'InventoryUpdate'])->name('inventory.update');
Route::get('/inventory/items/delete/{id}', [InventoryController::class, 'InventoryDelete'])->name('inventory.delete');

//supplier
Route::get('/suppliers/view', [SupplierController::class, 'SupplierView'])->name('suppliers.view');
Route::get('/suppliers/add', [SupplierController::class, 'SupplierAdd'])->name('suppliers.add');
Route::post('/suppliers/store', [SupplierController::class, 'SupplierStore'])->name('suppliers.store');

// employees
Route::get('/employees/view', [EmployeeController::class, 'EmployeeView'])->name('employees.view');
Route::get('/employees/add', [EmployeeController::class, 'EmployeeAdd'])->name('employees.add');
Route::post('/employees/store', [EmployeeController::class, 'EmployeeStore'])->name('employees.store');
Route::get('/employees/edit/{id}', [EmployeeController::class, 'EmployeeEdit'])->name('employees.edit');
Route::post('/employees/update/{id}', [EmployeeController::class, 'EmployeeUpdate'])->name('employees.update');

//Salary
Route::get('/employees/salary/view', [EmployeeSalaryController::class, 'EmployeeSalaryView'])->name('salary.view');
Route::get('/employees/salary/add', [EmployeeSalaryController::class, 'EmployeeSalaryAdd'])->name('salary.add');
Route::post('/employees/salary/store', [EmployeeSalaryController::class, 'EmployeeSalaryStore'])->name('salary.store');
Route::get('/employees/salary/increment/{id}', [EmployeeSalaryController::class, 'EmployeeSalaryincrement'])->name('salary.increment');
Route::get('/employees/salary/increment/detail/{id}', [EmployeeSalaryController::class, 'EmployeeSalaryincrementDetail'])->name('salary.incrementdetail');
Route::post('/employees/salary/increment/store/{id}', [EmployeeSalaryController::class, 'EmployeeSalaryincrementStore'])->name('salary.incrementstore');

//Branches
Route::get('/branches/view', [BranchController::class, 'BranchView'])->name('branch.view');
Route::get('/branches/add', [BranchController::class, 'BranchAdd'])->name('branch.add');
Route::post('/branches/store', [BranchController::class, 'BranchStore'])->name('branch.store');
Route::get('/branches/edit/{id}', [BranchController::class, 'BranchEdit'])->name('branch.edit');
Route::get('/branches/delete/{id}', [BranchController::class, 'BranchDelete'])->name('branch.delete');
Route::post('/branches/Update/{id}', [BranchController::class, 'BranchUpdate'])->name('branch.update');


});

Route::prefix('operations')->group(function(){
    Route::get('/employees/branches/view', [EmployeeTransferController::class, 'EmployeeBranchView'])->name('employees.branch.view');
    Route::get('/employees/transfer', [EmployeeTransferController::class, 'EmployeeTransferStart'])->name('employees.transfer');
    Route::post('/employees/store', [EmployeeTransferController::class, 'EmployeeTransferStore'])->name('employeestransfer.store');

// Patients

    Route::get('/patients/view', [PatientController::class, 'PatientView'])->name('patients.view');
    Route::get('/patients/edit/{user_id}', [PatientController::class, 'PatientEdit'])->name('patients.edit');
    Route::post('/patients/update/{user_id}', [PatientController::class, 'PatientUpdate'])->name('patients.update');
    Route::get('/patients/add', [PatientController::class, 'PatientAdd'])->name('patients.add');
    Route::post('/patients/store', [PatientController::class, 'PatientStore'])->name('patients.store');

//Appointments

    Route::get('/appointments/view', [AppointmentController::class, 'AppointmentView'])->name('appointments.view');
    Route::get('/appointments/calendar', [AppointmentController::class, 'AppointmentCalendar'])->name('appointments.calendar');
    Route::get('/appointments/calendar/display', [AppointmentController::class, 'AppointmentCalendarDisplay'])->name('appointments.calendar.display');
    Route::get('/appointments/add', [AppointmentController::class, 'AppointmentAdd'])->name('appointments.add');
    Route::get('/appointments/edit/{id}', [AppointmentController::class, 'AppointmentEdit'])->name('appointments.edit');
    Route::post('/appointments/update/{id}', [AppointmentController::class, 'AppointmentUpdate'])->name('appointments.update');
    Route::post('/appointments/store', [AppointmentController::class, 'AppointmentStore'])->name('appointments.store');

});