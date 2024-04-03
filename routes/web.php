<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('site.dashboard');
})->name('site.dashboard');

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])
    ->group(function ()
    {
        Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');
});
