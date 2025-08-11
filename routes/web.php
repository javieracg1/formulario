<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormularioController;
use App\Http\Controllers\Auth\LoginController;

// Rutas de autenticación
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Rutas protegidas (requieren autenticación)
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [FormularioController::class, 'dashboard'])->name('dashboard');
    Route::get('/formularios/{id}', [FormularioController::class, 'show'])->name('formulario.show');
    Route::get('/notifications', [FormularioController::class, 'getNotifications'])->name('notifications.get');
    Route::post('/notifications/{id}/read', [FormularioController::class, 'markNotificationAsRead'])->name('notifications.markAsRead');
    Route::post('/formularios/{id}/toggle-atendido', [FormularioController::class, 'toggleAtendido'])->name('formulario.toggle-atendido');
});

// Rutas públicas del formulario
Route::get('/', [FormularioController::class, 'showQuestion'])->name('formulario.question');
Route::post('/procesar-pregunta', [FormularioController::class, 'processQuestion'])->name('formulario.process_question');
Route::get('/pregunta-gerencia', [FormularioController::class, 'askGerencia'])->name('formulario.ask_gerencia');
Route::post('/procesar-gerencia', [FormularioController::class, 'processGerencia'])->name('formulario.process_gerencia');
Route::get('/formulario', [FormularioController::class, 'showForm'])->name('formulario.create');
Route::post('/formulario', [FormularioController::class, 'storeForm'])->name('formulario.store');

