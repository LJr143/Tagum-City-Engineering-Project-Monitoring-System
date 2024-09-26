<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/project-main', function () {
        return view('Project.project-main');
    })->name('project-main');
});



Route::get('/project-cost', function () {
    return view('Project.project-view-pow');
});

Route::get('/login', function () {
    return view('Login.login');
});

Route::get('/dashboard2', function () {
    return view('Login.dashboard');
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
Route::get('/viewproject1', function () {
    return view('layouts.Projects.viewproject1');
});
Route::get('/material-table-cost', function () {
    return view('layouts.Projects.material-cost-table');
});
Route::get('/main', function () {
    return view('layouts.Projects.maindashboard');
});






