<?php

use App\Http\Controllers\DashboardController;
use App\Livewire\ProjectMain;
use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Http\Controllers\AuthenticatedSessionController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('systemlogs', function () {
    return view('systemlogs');
})->name('systemlogs');
Route::get('report', function () {
    return view('report');
})->name('report');
Route::middleware([
    'auth:sanctum',
    config('stream.auth_session'),
    'verified',
])->group(function () {


});


Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/project-main', [\App\Http\Controllers\ProjectController::class, 'index'])->name('project-main');


Route::get('/view-project-pow', function () {
    return view('layouts.projects.viewproject1');
})->name('view-project-pow');


Route::get('/project-cost', function () {
    return view('layouts.projects.project-view-pow');
})->name('project-cost');

Route::get('/account-settings', function () {
    return view('layouts.account-settings.account-settings');
})->name('userProfile');

Route::get('/material-table-cost', function () {
    return view('layouts.Projects.material-cost-table');
});
// In your routes/web.php/ gidungag nako para mulahos gikan pow cards to material cost table
Route::get('/material-table-cost', function () {
    return view('layouts.Projects.material-cost-table');
})->name('material-table-cost');

Route::get('/main', function () {
    return view('layouts.Projects.dashboard');
});


route::get('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

Route::get('/system-logs', function () {
    return view('layouts.system_logs.system-logs');
})->name('system_logs');

Route::get('/report', function () {
    return view('layouts.reports.report');
});


Route::get('/user', function () {
    return view('layouts.user.manageUser');
})->name('user');
