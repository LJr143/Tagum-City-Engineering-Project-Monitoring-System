<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Report;

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
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/project-main', function () {
    return view('Project.project-main');
});

Route::get('/project-cost', function () {
    return view('Project.project-view-pow');
});

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

