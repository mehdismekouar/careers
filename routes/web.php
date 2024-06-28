<?php

use App\Http\Controllers\EmployerController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\UserController;
use App\Models\Employer;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::get('/storage/logos/{filename}', [FileController::class, 'getFile']);

Route::get('/', [JobController::class, 'index']);

Route::controller(UserController::class)->group(function () {
    Route::get('/user/{user}/edit', 'edit')
        ->middleware('auth')
        ->can('update', 'user')
        ->name('user.profile');
    Route::patch('/user/{user}', 'update')
        ->middleware('auth')
        ->can('update', 'user');
});

Route::controller(JobController::class)->group(function () {
    Route::get('/jobs/create', 'create')
        ->middleware('auth')
        ->name('jobs.create');
    Route::post('/jobs', 'store')->middleware('auth');
    Route::get('/jobs/{job}/edit', 'edit')
        ->middleware('auth')
        ->can('update', 'job');
    Route::delete('/jobs/{job}', 'destroy')
        ->middleware('auth')
        ->can('update', 'job');
    Route::patch('/jobs/{job}', 'update')
        ->middleware('auth')
        ->can('update', 'job');
});

Route::get('/search', SearchController::class);
Route::get('/tags/{tag}', TagController::class)->missing(function (Request $request) {
    return response()->view('no-results');
});

Route::controller(EmployerController::class)->group(function () {
    Route::get('/jobs/employer/{employer}', 'index')->name('employer.jobs');
    Route::get('/register', 'create')->name('register');
    Route::post('/register', 'store');
    Route::get('/employers', 'list')
        ->middleware('auth')
        ->can('list', Employer::class)
        ->name('employer.list');
    Route::get('/employer/{employer}/edit', 'edit')
        ->middleware('auth')
        ->can('view', 'employer')
        ->name('employer.profile');
    Route::patch('/employer/{employer}', 'update')
        ->middleware('auth')
        ->can('view', 'employer');
    Route::delete('/employer/{employer}', 'destroy')
        ->middleware('auth')
        ->can('list', 'employer');
});

Route::controller(SessionController::class)->middleware('guest')->group(function () {
    Route::get('/login', 'create')->name('login');
    Route::post('/login', 'store');
});

Route::post('/logout', [SessionController::class, 'destroy'])->middleware('auth');

Route::fallback(function () {
    return response()->view('no-results');
});
