<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GameController;
use App\Http\Controllers\DevController;
use App\Http\Controllers\PlataformController;
use App\Http\Middleware\isAuthenticated;
use App\Http\Controllers\ProfileController;


//Route::middleware("guest")->group(function () {
    
    Route::get('/', [AuthController::class, 'index'])->name('login');
    Route::get('/registro', [AuthController::class, 'registro'])->name('registro');

    Route::post('/registrar', [AuthController::class, 'registrar'])->name('registrar');
    Route::post('/logear', [AuthController::class, 'logear'])->name('logear');

//});
 
Route::middleware([isAuthenticated::class])->group(function () {
//Route::middleware("auth")->group(function () {
    
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    // Mostrar lista de juegos
    Route::get('/home', [GameController::class, 'index'])->name('modules.dashboard.home');
    Route::get('/games', [GameController::class, 'index'])->name('game.index');
    Route::get('/games/create', [GameController::class, 'create'])->name('game.create');
    Route::post('/games/store', [GameController::class, 'store'])->name('game.store');
    Route::get('/games/edit/{id}', [GameController::class, 'edit'])->name('game.edit');
    Route::put('/games/update/{id}', [GameController::class, 'update'])->name('game.update');
    Route::get('/games/show/{id}', [GameController::class, 'show'])->name('game.show');
    Route::delete('/games/destroy/{id}', [GameController::class, 'destroy'])->name('game.destroy');
    
    // Mostrar lista de desarrolladores
    Route::get('/developer', [DevController::class, 'index'])->name('developer.deve');

    Route::get('/developer/dev', [DevController::class, 'index'])->name('developer.index');
    Route::get('/developer/create', [DevController::class, 'create'])->name('developer.create');
    Route::post('/developer/store', [DevController::class, 'store'])->name('developer.store');
    Route::get('/developer/edit/{id}', [DevController::class, 'edit'])->name('developer.edit');
    Route::put('/developer/update/{id}', [DevController::class, 'update'])->name('developer.update');
    Route::get('/developer/show/{id}', [DevController::class, 'show'])->name('developer.show');
    Route::delete('/developer/destroy/{id}', [DevController::class, 'destroy'])->name('developer.destroy');
    // Mostrar lista de plataforma
    Route::get('/plataform', [PlataformController::class, 'index'])->name('plataform.index');
    Route::get('/plataform/create', [PlataformController::class, 'create'])->name('plataform.create');
    Route::post('/plataform/store', [PlataformController::class, 'store'])->name('plataform.store');
    Route::get('/plataform/edit/{id}', [PlataformController::class, 'edit'])->name('plataform.edit');
    Route::put('/plataform/update/{id}', [PlataformController::class, 'update'])->name('plataform.update');
    Route::get('/plataform/show/{id}', [PlataformController::class, 'show'])->name('plataform.show');
    Route::delete('/plataform/destroy/{id}', [PlataformController::class, 'destroy'])->name('plataform.destroy');
     // Mostrar la informacion de usuario
     Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
     Route::get('/profile/create', [ProfileController::class, 'create'])->name('profile.create');
     Route::post('/profile/store', [ProfileController::class, 'store'])->name('profile.store');
     Route::get('/profile/edit/{id}', [ProfileController::class, 'edit'])->name('profile.edit');
     Route::put('/profile/update/{id}', [ProfileController::class, 'update'])->name('profile.update');
     Route::get('/profile/show/{id}', [ProfileController::class, 'show'])->name('profile.show');
     Route::delete('/profile/destroy/{id}', [ProfileController::class, 'destroy'])->name('profile.destroy');

   
//}); 
}); 