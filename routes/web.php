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
    Route::controller(ProfileController::class)->group(function () {
        Route::get('/profile', 'edit')->name('profile.edit');
        Route::patch('/profile', 'update')->name('profile.update');
        Route::delete('/profile', 'destroy')->name('profile.destroy');
    });

    Route::controller(WorkerController::class)->group(function () {
        Route::get('/worker/create', 'createView')->name('worker.create');
        Route::post('/worker/create', 'create')->name('worker.create.post');

        Route::get('/worker', 'read')->name('worker');

        Route::get('/worker/update/{id}', 'updateView')->name('worker.update');
        Route::post('/worker/update', 'update')->name('worker.update.post');
        
        Route::get('/worker/delete/{id}', 'delete')->name('worker.delete');

        Route::get('/worker/detail/{id_number}', 'detail')->name('worker.detail');
        Route::get('/worker/{verify}/{id}', 'verify')->name('worker.verify');

    });
    Route::controller(WorkerCompetencyController::class)->group(function () {
        Route::get('/worker/competency/create/{user_id}', 'createView')->name('worker.competency.create');
        Route::post('/worker/competency/create', 'create')->name('worker.competency.create.post');

        Route::get('/worker/competency/update/{id}', 'updateView')->name('worker.competency.update');
        Route::post('/worker/competency/update', 'update')->name('worker.competency.update.post');

        Route::get('/worker/competency/delete/{id}', 'delete')->name('worker.competency.delete');
        Route::get('/worker/competency/{verify}/{id}', 'verify')->name('worker.competency.verify');
        
        Route::get('/report', 'report')->name('report');
        Route::get('/report/export', 'report_export')->name('report.export');
    });
    
    Route::controller(CompetencyController::class)->group(function () {        
        Route::get('/competency/create', 'createView')->name('competency.create');
        Route::post('/competency/create', 'create')->name('competency.create.post');
        
        Route::get('/competency', 'read')->name('competency');

        Route::get('/competency/update/{id}', 'updateView')->name('competency.update');
        Route::post('/competency/update', 'update')->name('competency.update.post');

        Route::get('/competency/delete/{id}', 'delete')->name('competency.delete');
    });
    
        
});

Route::get('/schedule', function () {
    return view('schedule');
})->middleware(['auth', 'verified'])->name('schedule');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


require __DIR__.'/auth.php';
