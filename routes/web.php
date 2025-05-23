<?php

use App\Http\Controllers\EmployeeController;

Route::get('/', function () { return view('menu'); })->name('menu');

Route::get('/employees', [EmployeeController::class, 'index'])->name('employee.index');
Route::get('/employee/create', [EmployeeController::class, 'create'])->name('employee.create');
Route::post('/employee/store', [EmployeeController::class, 'store'])->name('employee.store');
Route::get('/employee/{id}', [EmployeeController::class, 'show'])->name('employee.show');
Route::get('/employee/{id}/edit', [EmployeeController::class, 'edit'])->name('employee.edit');
Route::post('/employee/{id}/update', [EmployeeController::class, 'update'])->name('employee.update');
Route::post('/employee/{id}/delete', [EmployeeController::class, 'destroy'])->name('employee.destroy');
