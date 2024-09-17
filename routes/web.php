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
});

Route::get('/project-main', function () {
    return view('Project.project-main');
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



