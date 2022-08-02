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
            Route::post('/', [App\Http\Controllers\ProdutosController::class, 'store'])->name('produtos.store');
            Route::get('/create', [App\Http\Controllers\ProdutosController::class, 'create'])->name('produtos.create');
            Route::post('/crop', [App\Http\Controllers\ProdutosController::class, 'crop'])->name('produtos.crop');
            Route::get('/show/{id}', [App\Http\Controllers\ProdutosController::class, 'show'])->name('produtos.show');
            Route::get('/edit/{id}', [App\Http\Controllers\ProdutosController::class, 'edit'])->name('produtos.edit');
            Route::post('/update/{id}', [App\Http\Controllers\ProdutosController::class, 'update'])->name('produtos.update');
            Route::get('/destroy/{id}', [App\Http\Controllers\ProdutosController::class, 'destroy'])->name('produtos.destroy');
            Route::post('/addIngrediente', [App\Http\Controllers\ProdutosController::class, 'addIngrediente'])->name('produtos.addIngrediente');
            Route::post('/consultarIngredientes', [App\Http\Controllers\ProdutosController::class, 'consultarIngredientes'])->name('produtos.consultarIngredientes');
            Route::post('/removeIngredienteProduto', [App\Http\Controllers\ProdutosController::class, 'removeIngredienteProduto'])->name('produtos.removeIngredienteProduto');
            Route::post('/edit/addIngrediente', [App\Http\Controllers\ProdutosController::class, 'addIngrediente'])->name('produtos.addIngrediente');
            Route::post('/edit/consultarIngredientes', [App\Http\Controllers\ProdutosController::class, 'consultarIngredientes'])->name('produtos.consultarIngredientes');
            Route::post('/edit/removeIngredienteProduto', [App\Http\Controllers\ProdutosController::class, 'removeIngredienteProduto'])->name('produtos.removeIngredienteProduto');
        });

        // Rotas dos crops
        Route::prefix('crop')->group(function () {
            Route::post('/salvar/{pasta?}', [App\Http\Controllers\CropController::class, 'store'])->name('crop.store');
            Route::post('/excluir/{pasta?}', [App\Http\Controllers\CropController::class, 'delete'])->name('crop.delete');
        });

        // Rotas dos dashboard
        Route::prefix('dashboard')->group(function(){
            Route::get('pedidos', [App\Http\Controllers\AdminController::class, 'pedidos'])->name('dashboard.pedidos');
            Route::get('relatorios', [App\Http\Controllers\AdminController::class, 'relatorios'])->name('dashboard.relatorios');
            Route::get('criar_relatorio', [App\Http\Controllers\AdminController::class, 'criar_relatorio'])->name('dashboard.criar_relatorio');
            Route::get('finalizar-pedido/{id}', [App\Http\Controllers\AdminController::class, 'finalizarPedido'])->name('dashboard.finalizarPedido');
        });

        // Rotas das bebidas
        Route::prefix('bebidas')->group(function(){
            Route::get('/', [App\Http\Controllers\BebidasController::class, 'index'])->name('bebidas');
            Route::post('/', [App\Http\Controllers\BebidasController::class, 'store'])->name('bebidas.store');
            Route::get('/create', [App\Http\Controllers\BebidasController::class, 'create'])->name('bebidas.create');
            Route::post('/crop', [App\Http\Controllers\BebidasController::class, 'crop'])->name('bebidas.crop');
            Route::get('/show/{id}', [App\Http\Controllers\BebidasController::class, 'show'])->name('bebidas.show');
            Route::get('/edit/{id}', [App\Http\Controllers\BebidasController::class, 'edit'])->name('bebidas.edit');
            Route::post('/update/{id}', [App\Http\Controllers\BebidasController::class, 'update'])->name('bebidas.update');
            Route::get('/destroy/{id}', [App\Http\Controllers\BebidasController::class, 'destroy'])->name('bebidas.destroy');
        });
    });
});

Route::prefix('app')->group(function () {
    Route::get('/', [App\Http\Controllers\AppController::class, 'index'])->name('app');
    Route::get('/cardapio/{id?}', [App\Http\Controllers\CardapiosController::class, 'index'])->name('cardapios');

    Route::prefix('/produtos')->group(function (){
        Route::get('/{id?}', [App\Http\Controllers\AppProdutosController::class, 'index'])->name('app.produtos');
        Route::post('/salvar', [App\Http\Controllers\AppProdutosController::class, 'store'])->name('app.produtos.store');
        Route::post('/addproduto/{id}', [App\Http\Controllers\AppProdutosController::class, 'addProduto'])->name('app.produtos.add');
    });

    Route::prefix('/carrinho')->group(function (){
        Route::get('/', [App\Http\Controllers\AppCarrinhoController::class, 'index'])->name('app.carrinho');
        Route::get('/remover/{id}', [App\Http\Controllers\AppCarrinhoController::class, 'remover'])->name('app.carrinho.remover');
        Route::get('/finalizar/{nome_cliente?}', [App\Http\Controllers\AppCarrinhoController::class, 'finalizar'])->name('app.carrinho.finalizar');
    });

    Route::prefix('/bebidas')->group(function (){
        Route::get('/', [App\Http\Controllers\AppBebidasController::class, 'index'])->name('app.bebidas');
        Route::post('/{id?}', [App\Http\Controllers\AppBebidasController::class, 'store'])->name('app.bebidas.store');
        Route::post('/addbebida/{id}', [App\Http\Controllers\AppBebidasController::class, 'addBebida'])->name('app.bebidas.add');
    });
});

Route::prefix('controle')->group(function () {
    Route::middleware('auth')->group(function (){
        Route::get('/', [App\Http\Controllers\ControleController::class, 'index'])->name('controle');
        Route::get('/listar-pedido', [App\Http\Controllers\ControleController::class, 'listarPedido'])->name('controle.listar-pedido');
        Route::get('remover-pedido/{id}', [App\Http\Controllers\ControleController::class, 'removerPedido'])->name('controle.remover-pedido');
        Route::get('/imprimir-pedido/{id}', [App\Http\Controllers\ControleController::class, 'imprimirPedido'])->name('controle.imprimir-pedido');
        Route::get('/concluir-pedido/{id}', [App\Http\Controllers\ControleController::class, 'concluirPedido'])->name('controle.concluir-pedido');
    });
});