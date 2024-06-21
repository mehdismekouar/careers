<?php

use App\Http\Controllers\EmployerController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\FileController;
use App\Models\JobTag;

Route::get('/storage/logos/{filename}', [FileController::class, 'getFile']);


Route::get('/', [JobController::class,'index']);

Route::get('/jobs/create', [JobController::class,'create'])->middleware('auth')->name('jobs.create');
Route::post('/jobs', [JobController::class,'store'])->middleware('auth');
Route::get('/jobs/{job}/edit', [JobController::class,'edit'])->middleware('auth')->can('update', 'job');
Route::delete('/jobs/{job}', [JobController::class,'destroy'])->middleware('auth')->can('update', 'job');
Route::patch('/jobs/{job}', [JobController::class,'update'])->middleware('auth')->can('update', 'job');

Route::get('/jobs/employer/{employer}', [EmployerController::class,'index'])->middleware('auth')->can('view', 'employer')->name('employer.jobs');
Route::get('/employer/{employer}/edit', [EmployerController::class,'edit'])->middleware('auth')->can('view', 'employer')->name('profile');
Route::patch('/employer/{employer}', [EmployerController::class,'update'])->middleware('auth')->can('view', 'employer');

Route::get('/search', SearchController::class);
Route::get('/tags/{tag:name}', TagController::class);

Route::controller(RegistrationController::class)->group(function(){
    Route::get('/register', 'create')->name('register');
    Route::post('/register', 'store');
    Route::delete('/register', 'destroy');
});

Route::controller(SessionController::class)->middleware('guest')->group(function(){
    Route::get('/login', 'create')->name('login');
    Route::post('/login', 'store');
});

Route::post('/logout', [SessionController::class, 'destroy'])->middleware('auth');