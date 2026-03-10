<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Public welcome page
Route::get('/', function () {
    return "Welcome to the Role-Based Access Control System. Please <a href='/login'>login</a> to continue.";
});

// Temporary login route (needed for auth middleware)
// Route::get('/login', function() {
//     return 'Login page - implement your form here';
// })->name('login');

// Dashboard route: redirect based on role
// Route::get('/dashboard', function() {})->middleware(['auth', 'role.redirect']);


Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard'); // Create this Blade file
    })->name('dashboard');
});

// Admin dashboard
Route::middleware(['auth', 'role:Admin'])->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    });
});

// Manager dashboard
Route::middleware(['auth', 'role:Manager'])->group(function () {
    Route::get('/manager/dashboard', function () {
        return view('manager.dashboard');
    });
});

// Employee dashboard
Route::middleware(['auth', 'role:Employee'])->group(function () {
    Route::get('/employee/dashboard', function () {
        return view('employee.dashboard');
    });
});

// User profile routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Optional: Employee management permission
Route::get('/employees', function () {
    return "Employee List";
})->middleware(['auth', 'permission:manage employees']);

// Include auth routes if using Laravel auth scaffolding
require __DIR__.'/auth.php';