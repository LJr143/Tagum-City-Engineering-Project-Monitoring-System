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
