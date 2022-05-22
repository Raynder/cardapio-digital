<?php

use Illuminate\Support\Facades\Route;

Auth::routes();

// Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', function () {
    return redirect()->route('app');
})->name('home');

// Verificar autenticação antes de qualquer rota
Route::prefix('admin')->group(function () {
    Route::middleware('auth')->group(function () {
        // Rotas de grupos
        Route::prefix('grupos')->group(function () {
            Route::get('/', [App\Http\Controllers\GruposController::class, 'index'])->name('grupos');
            Route::get('/create', [App\Http\Controllers\GruposController::class, 'create'])->name('grupos.create');
            Route::post('/', [App\Http\Controllers\GruposController::class, 'store'])->name('grupos.store');
            Route::post('/crop', [App\Http\Controllers\GruposController::class, 'crop'])->name('grupos.crop');
            Route::get('/show/{id}', [App\Http\Controllers\GruposController::class, 'show'])->name('grupos.show');
            Route::get('/edit/{id}', [App\Http\Controllers\GruposController::class, 'edit'])->name('grupos.edit');
            Route::post('/update/{id}', [App\Http\Controllers\GruposController::class, 'update'])->name('grupos.update');
            Route::get('/destroy/{id}', [App\Http\Controllers\GruposController::class, 'destroy'])->name('grupos.destroy');
        });

        Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('perfil');
        Route::post('/perfil', [App\Http\Controllers\HomeController::class, 'update'])->name('perfil.update');
        Route::post('/perfil/foto', [App\Http\Controllers\HomeController::class, 'foto'])->name('perfil.foto');
        Route::post('/perfil/capa', [App\Http\Controllers\HomeController::class, 'capa'])->name('perfil.capa');

        // Rotas de ingredientes
        Route::prefix('ingredientes')->group(function () {
            Route::get('/', [App\Http\Controllers\IngredientesController::class, 'index'])->name('ingredientes');
            Route::post('/', [App\Http\Controllers\IngredientesController::class, 'store'])->name('ingredientes.store');
            Route::get('/create', [App\Http\Controllers\IngredientesController::class, 'create'])->name('ingredientes.create');
            Route::get('/show/{id}', [App\Http\Controllers\IngredientesController::class, 'show'])->name('ingredientes.show');
            Route::get('/edit/{id}', [App\Http\Controllers\IngredientesController::class, 'edit'])->name('ingredientes.edit');
            Route::post('/update/{id}', [App\Http\Controllers\IngredientesController::class, 'update'])->name('ingredientes.update');
            Route::get('/destroy/{id}', [App\Http\Controllers\IngredientesController::class, 'destroy'])->name('ingredientes.destroy');
        });
    });
});

Route::prefix('app')->group(function () {
    // Route::middleware('App\Http\Middleware\Authenticate')->group(function () {
        Route::get('/', [App\Http\Controllers\AppController::class, 'index'])->name('app');
        Route::get('/empresas', [App\Http\Controllers\EmpresasController::class, 'index'])->name('empresas');
    // });
});