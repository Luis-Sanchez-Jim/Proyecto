<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

// Tus controladores importados
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\EmployeController;
use App\Http\Controllers\CameraController;
use App\Http\Controllers\VehicleController;

// 1. Hace que la primera página al abrir el servidor sea el registro directamente
Route::get('/', function () {
    return view('auth.register');
})->middleware('guest');

// 2. Ruta del panel de control que crea Breeze por defecto al iniciar sesión
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// 3. TODO ESTE GRUPO REQUIERE INICIAR SESIÓN (Tus rutas protegidas)
Route::middleware('auth')->group(function () {
    
    /* Rutas del Perfil de Usuario (Creadas por Breeze) */
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    /* Rutas Administrador */
    Route::get('/admins', [AdminController::class, 'index'])->name('admins.index');
    Route::get('/admins/create', [AdminController::class, 'create'])->name('admins.create');
    Route::post('/admins', [AdminController::class, 'store'])->name('admins.store');
    Route::get('/admins/{admin}', [AdminController::class, 'show'])->name('admins.show');
    Route::get('/admins/{admin}/edit', [AdminController::class, 'edit'])->name('admins.edit');
    Route::put('/admins/{admin}', [AdminController::class, 'update'])->name('admins.update');
    Route::delete('/admins/{admin}', [AdminController::class, 'destroy'])->name('admins.destroy');

    /* Rutas Usuarios */
    Route::get('/clients', [ClientController::class, 'index'])->name('clients.index');
    Route::get('/clients/create', [ClientController::class, 'create'])->name('clients.create');
    Route::post('/clients', [ClientController::class, 'store'])->name('clients.store');
    Route::get('/clients/{client}', [ClientController::class, 'show'])->name('clients.show');
    Route::get('/clients/{client}/edit', [ClientController::class, 'edit'])->name('clients.edit');
    Route::put('/clients/{client}', [ClientController::class, 'update'])->name('clients.update');
    Route::delete('/clients/{client}', [ClientController::class, 'destroy'])->name('clients.destroy');

    /* Rutas Empleados */
    Route::get('/employes', [EmployeController::class, 'index'])->name('employes.index');
    Route::get('/employes/create', [EmployeController::class, 'create'])->name('employes.create');
    Route::post('/employes', [EmployeController::class, 'store'])->name('employes.store');
    Route::get('/employes/{employe}', [EmployeController::class, 'show'])->name('employes.show');
    Route::get('/employes/{employe}/edit', [EmployeController::class, 'edit'])->name('employes.edit');
    Route::put('/employes/{employe}', [EmployeController::class, 'update'])->name('employes.update');
    Route::delete('/employes/{employe}', [EmployeController::class, 'destroy'])->name('employes.destroy');

    /* Rutas Camaras*/
    Route::get('/cameras', [CameraController::class, 'index'])->name('cameras.index');
    Route::get('/cameras/create', [CameraController::class, 'create'])->name('cameras.create');
    Route::post('/cameras', [CameraController::class, 'store'])->name('cameras.store');
    Route::get('/cameras/{camera}', [CameraController::class, 'show'])->name('cameras.show');
    Route::get('/cameras/{camera}/edit', [CameraController::class, 'edit'])->name('cameras.edit');
    Route::put('/cameras/{camera}', [CameraController::class, 'update'])->name('cameras.update');
    Route::delete('/cameras/{camera}', [CameraController::class, 'destroy'])->name('cameras.destroy');

    /* Rutas Vehiculos */
    Route::get('/vehicles', [VehicleController::class, 'index'])->name('vehicles.index');
    Route::get('/vehicles/create', [VehicleController::class, 'create'])->name('vehicles.create');
    Route::post('/vehicles', [VehicleController::class, 'store'])->name('vehicles.store');
    Route::get('/vehicles/{vehicle}', [VehicleController::class, 'show'])->name('vehicles.show');
    Route::get('/vehicles/{vehicle}/edit', [VehicleController::class, 'edit'])->name('vehicles.edit');
    Route::put('/vehicles/{vehicle}', [VehicleController::class, 'update'])->name('vehicles.update');
    Route::delete('/vehicles/{vehicle}', [VehicleController::class, 'destroy'])->name('vehicles.destroy');

});

// Carga las rutas internas de Breeze (/login, /register, /logout)
require __DIR__.'/auth.php';
