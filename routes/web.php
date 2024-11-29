<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\UserController;
use App\Livewire\Dashboard;
use App\Livewire\ViewPoMaterials;
use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Http\Controllers\AuthenticatedSessionController;

// Public Route
Route::get('/', function () {
    return view('auth.login');
});

// Authenticated Routes
Route::middleware(['auth:sanctum', 'verified'])->group(function () {

    // Dashboard routing
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // User Profile
    Route::get('/account-settings', function () {
        return view('layouts.account-settings.account-settings');
    })->name('userProfile');

    Route::post('changeInf', [UserController::class, 'changeInf'])->name('changeInf');
    Route::post('updateContact', [UserController::class, 'updateContact'])->name('updateContact');
    Route::post('updatePassword', [UserController::class, 'updatePassword'])->name('updatePassword');
    Route::post('uploadImage', [UserController::class, 'uploadImage'])->name('uploadImage');
    Route::post('upload', [UserController::class, 'upload'])->name('upload');

    Route::get('/view-po-materials/{purchase_order_number}', ViewPoMaterials::class)
        ->name('view-po-materials');

    // Report
    Route::get('/report', function () {
        return view('layouts.reports.report-');
    })->name('report');


    // Project Management
    Route::prefix('project')->group(function () {

//        Route::get('/main', [ProjectController::class, 'index'])->name('project-main');
        Route::get('/view-pow/{id}', [ProjectController::class, 'view'])->name('view-project-pow');
        Route::get('/material-table-cost/{pow_id}/{index}', [ProjectController::class, 'viewPowInfo'])->name('material-table-cost');
        Route::delete('/{id}', [ProjectController::class, 'destroy'])->name('project.destroy');
        Route::delete('/pow/{id}', [ProjectController::class, 'destroyPow'])->name('pow.destroy');
        Route::get('/material-table-cost', function () {
            return view('layouts.Projects.material-cost-table');
        });

        Route::get('/project/main', [ProjectController::class, 'index'])->name('project-main');

        Route::post('/projects/suspend', [ProjectController::class, 'suspend'])->name('projects.suspend');
        Route::post('/projects/resume', [ProjectController::class, 'resume'])->name('projects.resume');
        Route::post('/projects/realign', [ProjectController::class, 'realignFunds'])->name('projects.realign');

    });


    Route::get('/report', function () {
        return view('layouts.reports.report-');
    })->name('report');

    // Logout
    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

    // User Management (Admin)
    Route::middleware('role:admin,encoder')->group(function () {


        Route::get('/manage-user', [UserController::class, 'index'])->name('manage-user');

        //System Configuration
        Route::get('/system-configuration', function () {
            return view('layouts.system configuration.system_configuration');
        })->name('system-configuration');

        // System Logs
        Route::get('/system-logs', function () {
            return view('layouts.system_logs.system-logs');
        })->name('system-logs');


        Route::post('/project/{id}/approve', [ProjectController::class, 'approveProject'])->name('project.approve');
        Route::post('/project/{id}/deny', [ProjectController::class, 'denyProject'])->name('project.deny');


    });
});

