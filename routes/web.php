<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WorkerController;
use App\Http\Controllers\WorkerCompetencyController;
use App\Http\Controllers\CompetencyController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\ScheduleTimesController;
use App\Http\Controllers\ScheduleWorkersController;
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
    
    Route::controller(ScheduleController::class)->group(function () {        
        Route::get('/schedule/create', 'createView')->name('schedule.create');
        Route::post('/schedule/create', 'create')->name('schedule.create.post');
        
        Route::get('/schedule', 'read')->name('schedule');
        Route::get('/schedule/manage', 'manage')->name('schedule.manage');

        Route::get('/schedule/update/{id}', 'updateView')->name('schedule.update');
        Route::post('/schedule/update', 'update')->name('schedule.update.post');

        Route::get('/schedule/delete/{id}', 'delete')->name('schedule.delete');
    });

    Route::controller(ScheduleTimesController::class)->group(function () {        
        Route::get('/schedule/time/create', 'createView')->name('schedule.time.create');
        Route::post('/schedule/time/create', 'create')->name('schedule.time.create.post');

        Route::get('/schedule/time/update/{id}', 'updateView')->name('schedule.time.update');
        Route::post('/schedule/time/update', 'update')->name('schedule.time.update.post');

        Route::get('/schedule/time/delete/{id}', 'delete')->name('schedule.time.delete');
    });
    Route::controller(ScheduleWorkersController::class)->group(function () {        
        Route::get('/schedule/worker/create', 'createView')->name('schedule.worker.create');
        Route::post('/schedule/worker/create', 'create')->name('schedule.worker.create.post');

        Route::get('/schedule/worker/update/{id}', 'updateView')->name('schedule.worker.update');
        Route::post('/schedule/worker/update', 'update')->name('schedule.worker.update.post');

        Route::get('/schedule/worker/delete/{id}', 'delete')->name('schedule.worker.delete');
    });

    


    
        
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


require __DIR__.'/auth.php';
