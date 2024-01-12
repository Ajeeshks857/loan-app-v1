<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LoanDetailsController;
use App\Http\Controllers\ProcessDataController;
use App\Http\Controllers\EmiDetailsDisplayController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect('/login');

});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [LoanDetailsController::class, 'index'])->name('dashboard');
    Route::get('/loan-details', [LoanDetailsController::class, 'getLoanDetails']);
    Route::get('/process-data', [ProcessDataController::class, 'index'])->name('process-data.index');
    Route::post('/process-data', [ProcessDataController::class, 'processData'])->name('process-data.process');
    Route::get('/emi-details-display', [EmiDetailsDisplayController::class, 'index'])->name('emi-details-display.index');

    // Profile routes
    Route::prefix('/profile')->group(function () {
        Route::get('/edit', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/update', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/destroy', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });
});


require __DIR__.'/auth.php';
