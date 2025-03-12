<?php

use App\Http\Controllers\AttorneyController;
use App\Http\Controllers\CaseController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ClientManagementController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
    Route::resource('/users', UserController::class);
    Route::resource('/clients', ClientController::class);
    Route::resource('/attorneys', AttorneyController::class);
    Route::resource('/cases', CaseController::class);
    Route::post('/cases/{id}/approve', [CaseController::class, 'approve'])->name('cases.approve');
    Route::get('/events', [DashboardController::class, 'fetchEvents']);
    Route::get('/calender', [DashboardController::class, 'calender'])->name('calender.index');

});
// court dates
// attorneys
// case details
// client name
// attorney name


