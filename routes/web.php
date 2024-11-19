<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\UserController;
use App\Livewire\Dashboard;
use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Http\Controllers\AuthenticatedSessionController;

// Public Route
Route::get('/', function () {
    return view('auth.login');
});

    // Authenticated Routes
    Route::middleware(['auth:sanctum', 'verified', 'inactivity.logout'])->group(function () {

    // Dashboard
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // User Profile
    Route::get('/account-settings', function () {
        return view('layouts.account-settings.account-settings');
    })->name('userProfile');

    // Project Management
    Route::prefix('project')->group(function () {
        Route::get('/main', [ProjectController::class, 'index'])->name('project-main');
        Route::get('/view-pow/{id}', [ProjectController::class, 'view'])->name('view-project-pow');
        Route::get('/material-table-cost/{pow_id}/{index}', [ProjectController::class, 'viewPowInfo'])->name('material-table-cost');
        Route::delete('/{id}', [ProjectController::class, 'destroy'])->name('project.destroy');
        Route::delete('/pow/{id}', [ProjectController::class, 'destroyPow'])->name('pow.destroy');
        Route::get('/material-table-cost', function () {
            return view('layouts.Projects.material-cost-table');
        });

        Route::post('/projects/suspend', [ProjectController::class, 'suspend'])->name('projects.suspend');
        Route::post('/projects/resume', [ProjectController::class, 'resume'])->name('projects.resume');
        Route::post('/projects/realign', [ProjectController::class, 'realignFunds'])->name('projects.realign');


    });

    // User Management (Admin)
    Route::middleware('role:admin,encoder')->group(function () {
        Route::get('/manage-user', [UserController::class, 'index'])->name('manage-user');

        //System Configuration
        Route::get('/system-configuration', function (){
            return view('layouts.system configuration.system_configuration');
        })->name('system-configuration');

        // System Logs
        Route::get('/system-logs', function () {
            return view('layouts.system_logs.system-logs');
        })->name('system-logs');

        // Report
        Route::get('/report', function () {
            return view('layouts.reports.report-');
        })->name('report');
    });

    Route::get('/report', function () {
        return view('layouts.reports.report-');
    })->name('report');

    // Logout
    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
});

// Viewer Routes
Route::prefix('viewer')->group(function () {
    Route::get('/project', function () {
        return view('layouts.viewer.view-project-viewer');
    });

    Route::get('/specific-project', function () {
        return view('layouts.viewer.view-specific-project-viewer');
    })->name('view-specific-project-viewer');

    Route::get('/pow', function () {
        return view('layouts.viewer.view-pow-viewer');
    })->name('view-pow-viewer');
});
