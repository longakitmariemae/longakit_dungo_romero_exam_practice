<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;



Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



Route::middleware('auth')->group(function () {
    Route::view('about', 'about')->name('about');
    
    Route::get('employee', [EmployeeController::class, 'index'])->name('employee.index');
    Route::get('employee/create', [EmployeeController::class, 'create'])->name('employee.create');
    Route::post('employee', [EmployeeController::class, 'store'])->name('employee.store');
    Route::get('employee/{id}/edit', [EmployeeController::class, 'edit'])->name('employee.edit');
    Route::put('employee/{id}/edit', [EmployeeController::class, 'update'])->name('employee.update');
    Route::get('employee/{id}/delete', [EmployeeController::class, 'delete'])->name('employee.delete');
    Route::get('users', [\App\Http\Controllers\UserController::class, 'index'])->name('users.index');

    

    route::get('student', [\App\Http\Controllers\StudentController::class, 'index'])->name('student.index');
    route::get('student/create', [\App\Http\Controllers\StudentController::class, 'create'])->name('student.create');
    route::post('student', [\App\Http\Controllers\StudentController::class, 'store'])->name('student.store');
    route::get('student/{id}/edit', [\App\Http\Controllers\StudentController::class, 'edit'])->name('student.edit');
    route::put('student/{id}/edit', [\App\Http\Controllers\StudentController::class, 'update'])->name('student.update');
    route::delete('student/{id}/delete', [\App\Http\Controllers\StudentController::class, 'delete'])->name('student.delete');





    Route::get('profile', [\App\Http\Controllers\ProfileController::class, 'show'])->name('profile.show');
    Route::put('profile', [\App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
});
