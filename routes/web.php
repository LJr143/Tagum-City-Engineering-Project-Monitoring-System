<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Http\Controllers\AuthenticatedSessionController;

Route::middleware(['auth:sanctum', 'verified', 'inactivity.logout'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/project-main', [ProjectController::class, 'index'])->name('project-main');
    Route::get('/view-project-pow/{id}', [ProjectController::class, 'view'])->name('view-project-pow');
    Route::get('/material-table-cost/{pow_id}/{index}', [ProjectController::class, 'viewPowInfo'])->name('material-table-cost');

    // Apply role middleware here
    Route::get('/manage-user', [UserController::class, 'index'])->middleware('role:admin')->name('manage-user');
    Route::get('/system-logs', function () {
        return view('layouts.system_logs.system-logs');
    })->middleware('role:admin')->name('system-logs');
});


Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
Route::delete('/project/{id}', [ProjectController::class, 'destroy'])->name('project.destroy');
Route::delete('/pow/{id}', [ProjectController::class, 'destroyPow'])->name('pow.destroy');






//Route::post('/materials/import', [ProjectController::class, 'import'])->name('materials.import');
//Route::get('/material-table-cost/{project_id}', [ProjectController::class, 'destroy'])->name('material-table-cost');
//Route::get('/engineers', [UserController::class, 'getEngineers']);



Route::get('/', function () {
    return view('auth.login');
});

Route::get('report', function () {
    return view('report');
})->name('report');

//Route::get('/users', function () {
//    return view('layouts.user.manageUser');
//})->name('user');

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
//Route::get('/material-table-cost', function () {
//    return view('layouts.Projects.material-cost-table');
//})->name('material-table-cost');

Route::get('/main', function () {
    return view('layouts.Projects.dashboard');
});

Route::get('/proj-pow-engineer', function () {
    return view('layouts.Projects.proj-pow-engineer');
});
Route::get('/engineer-materialscost-table', function () {
    return view('layouts.Projects.engineer-materialscost-table');
});


Route::get('/report', function () {
    return view('layouts.reports.report');
})->name('report');


//Route::get('/user', function () {
//    return view('layouts.user.manageUser');
//})->name('user');



//FOR VIEWER

//Route::get('/view-project-viewer', function () {
//    return view('layouts.viewer.view-project-viewer');
//})->name('user');

Route::get('/view-specific-project-viewer', function () {
    return view('layouts.viewer.view-specific-project-viewer');
});

Route::get('/view-specific-project-viewer', function () {
    return view('layouts.viewer.view-specific-project-viewer');
})->name('view-specific-project-viewer');

Route::get('/view-pow-viewer', function () {
    return view('layouts.viewer.view-pow-viewer');
});

Route::get('/view-pow-viewer', function () {
    return view('layouts.viewer.view-pow-viewer');
})->name('view-pow-viewer');

//Route::get('/view-pow-engineer', function () {
//    return view('layouts.engineer.view-pow-engineer');
//})->name('user');

//END FOR VIEWER
