<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Show employee registration form
Route::get('/',[App\Http\Controllers\EmployeeController::class,'register']);
// Check for duplicate email
Route::get('/check-email', 'EmployeeController@checkEmail')->name('employees.checkEmail');
// Check for duplicate phone number
Route::get('/check-phone', 'EmployeeController@checkPhone')->name('employees.checkPhone');
//crud operations
Route::get('/list',[App\Http\Controllers\EmployeeController::class,'index'])->name('employee.list');
Route::get('/add',[App\Http\Controllers\EmployeeController::class,'add'])->name('employee.add');
Route::post('/employee/store',[App\Http\Controllers\EmployeeController::class,'store'])->name('employee.store');
Route::get('/employees/edit/{id}',[App\Http\Controllers\EmployeeController::class,'edit'])->name('employee.edit');
Route::post('/employees/update/{id}',[App\Http\Controllers\EmployeeController::class,'update'])->name('employee.update');
Route::get('/employees/delete/{id}',[App\Http\Controllers\EmployeeController::class,'delete'])->name('employee.delete');

