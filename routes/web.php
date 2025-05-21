<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EntryController\ServiceEntryController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('test', function () {  // Correct spelling of "function"
    return Inertia::render('Test');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//data visulaziation
Route::get('/service-entry/create', function () {
    return Inertia::render('ServiceEntry');
})->name('service-entry.create');

Route::post('/service-entry', [ServiceEntryController::class, 'store'])->name('service-entry.store');

require __DIR__ . '/auth.php';
