<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\SesiController;
use App\Http\Controllers\SopirController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\UserAkses;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::middleware(['guest'])->group(function(){
    Route::get('/', [SesiController::class, 'index'])->name('login');
    Route::post('/', [SesiController::class, 'login']);



});

Route::resource('home', UserController::class);



Route::middleware(['auth'])->group(function(){
    Route::middleware(['UserAkses:admin'])->group(function(){
        Route::get('admin',[AdminController::class,'index'])->name('admin.Dashboard');
        Route::put('admin/sopir/update-image/{id}' , [SopirController::class, 'updateImage'])->name('sopir.updateImage');
        Route::resource('admin/sopir', SopirController::class);
    });

    Route::get('/logout', [SesiController::class, 'logout'])->name('logout');
});




