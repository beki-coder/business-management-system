<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\EmployeeController;
use App\Http\Controllers\Admin\ClientController;
use App\Http\Controllers\Employee\TaskController as EmployeeTaskController;
use App\Http\Controllers\Manager\ProjectController;
use App\Http\Controllers\Manager\TaskController;

use App\Http\Controllers\ReportController;

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Public Route
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

/*
|--------------------------------------------------------------------------
| Dashboard (Authenticated Users)
|--------------------------------------------------------------------------
*/

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth','verified'])->name('dashboard');
// Route::get('/dashboard', function () {
//     $user = auth()->user();
//     if ($user->hasRole('Admin')) return redirect()->route('admin.dashboard');
//     if ($user->hasRole('Manager')) return redirect()->route('manager.projects.index');
//     if ($user->hasRole('Employee')) return redirect()->route('employee.tasks.index');
//     abort(403);
// })->middleware(['auth','verified'])->name('dashboard');
/*
|--------------------------------------------------------------------------
| Profile (Breeze)
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    Route::get('/profile',[ProfileController::class,'edit'])->name('profile.edit');

    Route::patch('/profile',[ProfileController::class,'update'])->name('profile.update');

    Route::delete('/profile',[ProfileController::class,'destroy'])->name('profile.destroy');

});


/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/

Route::middleware(['auth','role:Admin'])->prefix('admin')->group(function () {

    Route::get('/dashboard',[AdminDashboardController::class,'index'])
        ->name('admin.dashboard');

    Route::resource('/employees',EmployeeController::class);

    Route::resource('/clients',ClientController::class);

});


/*
|--------------------------------------------------------------------------
| Manager Routes
|--------------------------------------------------------------------------
*/

Route::middleware(['auth','role:Manager'])->prefix('manager')->group(function () {

    Route::resource('/projects',ProjectController::class);

    Route::resource('/tasks',TaskController::class);

});


/*
|--------------------------------------------------------------------------
| Reports (Admin + Manager)
|--------------------------------------------------------------------------
*/

Route::middleware(['auth','role:Admin|Manager'])->group(function () {

    Route::get('/reports',[ReportController::class,'index'])
        ->name('reports.index');

});


Route::middleware(['auth', 'role:Employee'])
     ->prefix('employee')
     ->name('employee.')
     ->group(function () {
         Route::resource('tasks', EmployeeTaskController::class);
     });

/*
|--------------------------------------------------------------------------
| Breeze Authentication Routes
|--------------------------------------------------------------------------
*/

require __DIR__.'/auth.php';