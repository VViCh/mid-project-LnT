<?php

use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [EmployeeController::class, 'getEmployees'])->name('employee.view');
Route::get('/create', [EmployeeController::class, "getCreatePage"])->name('employee.create.page');
Route::post('/create-employee', [EmployeeController::class, 'createEmployee'])->name('employee.create');
Route::get('/update-employee/{id}', [EmployeeController::class, 'getUpdatePage'])->name('employee.update.page');
Route::patch('/update/{id}', [EmployeeController::class, 'updateEmployee'])->name('employee.update');
Route::delete('/delete/{id}', [EmployeeController::class, 'deleteEmployee'])->name('employee.delete');