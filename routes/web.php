<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\ProfileController;

// Tus controladores importados
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\EmployeController;
use App\Http\Controllers\CameraController;
use App\Http\Controllers\ServiceController;

// 1. Hace que la primera página al abrir el servidor sea el registro directamente
Route::get('/', function () {
    return view('auth.login');
})->middleware('guest');

// 2. Ruta del panel de control que crea Breeze por defecto al iniciar sesión
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// 3. TODO ESTE GRUPO REQUIERE INICIAR SESIÓN (Tus rutas protegidas)
Route::middleware('auth')->group(function () {
    
    // Perfil: cualquier usuario autenticado puede gestionarlo.
    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');


    // Solo los administradores pueden gestionar estos módulos.
    Route::middleware('role:admin')->group(function () {

        // Administradores
        Route::resource('admins', AdminController::class);

        // Clientes
        Route::resource('clients', ClientController::class);

        // Empleados
        Route::resource('employes', EmployeController::class);

        // Cámaras
        Route::resource('cameras', CameraController::class);

        // Servicios
        Route::resource('services', ServiceController::class);

    });

});
    


// Carga las rutas internas de Breeze (/login, /register, /logout)
require __DIR__.'/auth.php';
