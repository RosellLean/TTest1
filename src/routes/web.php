<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\DocumentRequestController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::get('/tickets/create', [TicketController::class, 'create'])->name('tickets.create');
    Route::post('/tickets', [TicketController::class, 'store'])->name('tickets.store');
});

Route::get('/tickets/{ticket}', [TicketController::class, 'show'])
    ->name('tickets.show')
    ->middleware('auth');

Route::post('/tickets/{ticket}/documents', [DocumentController::class, 'store'])
    ->name('tickets.documents.store');

Route::post('/tickets/{ticket}/request-document', [DocumentRequestController::class, 'store'])
    ->middleware('role:agent')
    ->name('tickets.request-document');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
