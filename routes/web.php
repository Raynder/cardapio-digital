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
            Route::get('/itens', [App\Http\Controllers\GruposController::class, 'itens'])->name('grupos.itens');
            Route::post('/addProduto', [App\Http\Controllers\GruposController::class, 'addProduto'])->name('grupos.addProduto');
            Route::get('/consultarProduto/{filtro?}', [App\Http\Controllers\GruposController::class, 'consultarProduto'])->name('grupos.consultarProduto');
            Route::post('/removeGrupoProduto', [App\Http\Controllers\GruposController::class, 'removeGrupoProduto'])->name('grupos.removeGrupoProduto');
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

        // Rotas de produtos
        Route::prefix('produtos')->group(function () {
            Route::get('/', [App\Http\Controllers\ProdutosController::class, 'index'])->name('produtos');
            Route::get('/create', [App\Http\Controllers\ProdutosController::class, 'create'])->name('produtos.create');
            Route::post('/', [App\Http\Controllers\ProdutosController::class, 'store'])->name('produtos.store');
            Route::post('/crop', [App\Http\Controllers\ProdutosController::class, 'crop'])->name('produtos.crop');
            Route::get('/show/{id}', [App\Http\Controllers\ProdutosController::class, 'show'])->name('produtos.show');
            Route::get('/edit/{id}', [App\Http\Controllers\ProdutosController::class, 'edit'])->name('produtos.edit');
            Route::post('/update/{id}', [App\Http\Controllers\ProdutosController::class, 'update'])->name('produtos.update');
            Route::get('/destroy/{id}', [App\Http\Controllers\ProdutosController::class, 'destroy'])->name('produtos.destroy');
            Route::post('/addIngrediente', [App\Http\Controllers\ProdutosController::class, 'addIngrediente'])->name('produtos.addIngrediente');
            Route::post('/consultarIngredientes', [App\Http\Controllers\ProdutosController::class, 'consultarIngredientes'])->name('produtos.consultarIngredientes');
            Route::post('/removeIngredienteProduto', [App\Http\Controllers\ProdutosController::class, 'removeIngredienteProduto'])->name('produtos.removeIngredienteProduto');
        });
    });
});

Route::prefix('app')->group(function () {
    // Route::middleware('App\Http\Middleware\Authenticate')->group(function () {
        Route::get('/', [App\Http\Controllers\AppController::class, 'index'])->name('app');
        Route::get('/cardapio', [App\Http\Controllers\cardapiosController::class, 'index'])->name('cardapios');
    // });
});