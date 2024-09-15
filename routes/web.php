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
    // VIEWPROJECT SWEET
    Route::get('/viewproject1', function () {
        return view('layouts.Projects.viewproject1');
    });
    Route::get('/viewproject2', function () {
        return view('layouts.Projects.viewproject2');
    });
