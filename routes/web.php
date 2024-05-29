<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WorkerController;
use App\Http\Controllers\WorkerCompetencyController;
use App\Http\Controllers\CompetencyController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // return view('welcome');
    return redirect('/login');
});

Route::middleware('auth')->group(function () {
    Route::controller(WorkerController::class)->group(function () {
        Route::get('/worker/create', 'createView')->name('worker.create');
        Route::post('/worker/create', 'create')->name('worker.create.post');

        Route::get('/worker', 'read')->name('worker');

        Route::get('/worker/update/{id}', 'updateView')->name('worker.update');
        Route::post('/worker/update', 'update')->name('worker.update.post');
        
        Route::get('/worker/delete/{id}', 'delete')->name('worker.delete');

        Route::get('/worker/competency/create/{id_number}', 'createCompetencyView')->name('worker.competency.create');
        Route::post('/worker/competency/create', 'createCompetency')->name('worker.competency.create.post');

        Route::get('/worker/detail/{id_number}', 'detail')->name('worker.detail');
    });


});

Route::get('/competency', function () {
    return view('competency');
})->middleware(['auth', 'verified'])->name('competency');

Route::get('/report', function () {
    return view('report');
})->middleware(['auth', 'verified'])->name('report');

Route::get('/schedule', function () {
    return view('schedule');
})->middleware(['auth', 'verified'])->name('schedule');
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
