<?php

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

Route::get('/dashboard', function () {
    return view('layouts.Projects.maindashboard');
})->name('dashboard');

Route::get('/project-main', function () {
    return view('Project.project-main');
})->name('project-main');

Route::get('/view-project-pow', function () {
    return view('layouts.Projects.viewproject1');
})->name('view-project-pow');


Route::get('/project-cost', function () {
    return view('Project.project-view-pow');
})->name('project-cost');

Route::get('/userProfile', function () {
    return view('userProfile.userProfile');
});

Route::get('/adduserModal', function () {
    return view('Modals.add-user-modal');
});

Route::get('/editUserModal', function () {
    return view('Modals.edit-user-modal');
});

Route::get('/deleteUserModal', function () {
    return view('Modals.delete-user-modal');
});

Route::get('/material-table-cost', function () {
    return view('layouts.Projects.material-cost-table');
});
Route::get('/main', function () {
    return view('layouts.Projects.maindashboard');
});


route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');





