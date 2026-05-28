<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UsuarioController;
use Illuminate\Support\Facades\Auth;



Route::get('/login', function () {
    return view('login');
})->name('login');

Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');



Route::middleware('auth')->group(function () {

   
    Route::get('/perfil', function () {
        return view('perfil');
    });

 
    Route::get('/admin', [UsuarioController::class, 'index']);

    Route::post('/usuarios', [UsuarioController::class, 'store']);
    Route::put('/usuarios/{id}', [UsuarioController::class, 'update']);
    Route::delete('/usuarios/{id}', [UsuarioController::class, 'destroy']);

});