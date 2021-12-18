<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\HomeController;
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

Route::get('/', function () {
    return redirect()->route('home');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/department', [App\Http\Controllers\HomeController::class, 'department'])->name('department');
Route::get('/employee', [EmployeeController::class, 'employee'])->name('employee'); 
Route::post('/insertemployee', [EmployeeController::class, 'insertEmployee'])->name('insertemployee'); 
Route::post('/deleteemployee', [EmployeeController::class, 'deleteEmployee'])->name('deleteemployee'); 
Route::post('/getemployeedetail', [EmployeeController::class, 'getEmployeeDetail'])->name('getemployeedetail'); 
Route::post('/editemployee', [EmployeeController::class, 'editEmployee'])->name('editemployee'); 
