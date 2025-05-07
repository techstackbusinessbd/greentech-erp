<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Roles\RoleController;

Route::get('/', function () {
    if(Auth::user()){
        return redirect()->route('admin.dashboard');
    }
    return view('auth.login');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


Route::prefix('admin')->middleware('auth')->group(function(){
    //Dashboard Route
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

    //Role Routes
    Route::resource('roles', RoleController::class);

    // Ajax-specific routes
    Route::post('roles/toggle-status/{id}', [RoleController::class, 'toggleStatus'])->name('roles.toggle-status');
    Route::post('roles/duplicate/{id}', [RoleController::class, 'duplicate'])->name('roles.duplicate');

});
