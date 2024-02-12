<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\UnderEmployeeController;



Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/employDashboard', [EmployeeController::class, 'employDashboardpage'])->name('profile.show');
    Route::get('/employee', [EmployeeController::class, 'employeepage']);
    Route::post('/employee/save', [EmployeeController::class,'employeecreate']);
    Route::get('/list-employee', [EmployeeController::class,'listemployee']);
    Route::get('/Salepage', [EmployeeController::class,'Salepage']);
             /// Under employee create 
    Route::post('/savedata', [UnderEmployeeController::class,'createemployee']);
             /// Under employee create 
    Route::get('/employee-sale',[SaleController::class,'employeesalepage']);   
    Route::get('/employee-under/{mainEmployerId}',[SaleController::class,'employeelist']);
    Route::post('/save-sale',[SaleController::class,'salesaveall']);
    Route::get('/employee-all-list',[SaleController::class,'EmployeeAllList']);
    Route::get('/sale-list',[SaleController::class,'saleslist'] );

});

require __DIR__.'/auth.php';
