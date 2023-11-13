<?php

use App\Models\CidadeP;
use App\Models\VpessoaUsuario;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CidadePController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VpessoaUsuarioController;
use App\Http\Controllers\ProdutoFornecedorController;
use App\Http\Controllers\VpessoaGeralController;
use App\Http\Controllers\VprodutoController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', [ProdutoFornecedorController::class, 'index']);
Route::get('/dashboard', function () {
   
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [VpessoaUsuarioController::class, 'index'])->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/produtopreco', [VprodutoController::class, 'index'])->name('getCadastroPassagens');
    Route::get('/produtopreco/{id}/edit', [VprodutoController::class, 'edit'])->name('produtopreco.edit');
    Route::put('/produtopreco/{id}', [VprodutoController::class, 'update'])->name('produtopreco.update');

    Route::get('/getPessoaGeral', [VpessoaGeralController::class, 'index'])->name('getPessoaGeral');
    Route::get('/getVenda', [CidadePController::class, 'index'])->name('getVenda');
    Route::get('/getVendaBalcao', [CidadePController::class, 'index'])->name('getVendaBalcao');
    Route::get('/getCaixa', [CidadePController::class, 'index'])->name('getCaixa');
    Route::get('/getVendaReceberSangriaGrid', [CidadePController::class, 'index'])->name('getVendaReceberSangriaGrid');
    Route::get('/alterarSenha', [CidadePController::class, 'index'])->name('alterarSenha');
    Route::get('/getCadastroUnidade', [CidadePController::class, 'index'])->name('getCadastroUnidade');
    Route::get('/getCadastroEstado', [CidadePController::class, 'index'])->name('getCadastroEstado');
    Route::get('/getCadastroIpi', [CidadePController::class, 'index'])->name('getCadastroIpi');
    Route::get('/getCaixaUnicoLinhaVeiculo', [CidadePController::class, 'index'])->name('getCaixaUnicoLinhaVeiculo');
    Route::get('/getVeiculo', [CidadePController::class, 'index'])->name('getVeiculo');
    Route::get('/getCargaVeiculomulta', [CidadePController::class, 'index'])->name('getCargaVeiculomulta');
        Route::get('/getVApuraOsCmSys', [CidadePController::class, 'index'])->name('getVApuraOsCmSys');
    Route::get('/getEscala', [CidadePController::class, 'index'])->name('getEscala');  
    Route::get('/getCadastroGrupo', [CidadePController::class, 'index'])->name('getCadastroGrupo');    
    Route::get('/getCadastroItinerario', [CidadePController::class, 'index'])->name('getCadastroItinerario'); 
    Route::get('/getApuraOperacao', [CidadePController::class, 'index'])->name('getApuraOperacao'); 
    Route::get('/getComprasSolicitacao', [CidadePController::class, 'index'])->name('getComprasSolicitacao');
    Route::get('/getCompra', [CidadePController::class, 'index'])->name('getCompra'); 
    Route::get('/getRecadoChamado', [CidadePController::class, 'index'])->name('getRecadoChamado'); 
    Route::get('/getPessoaTipo', [CidadePController::class, 'index'])->name('getPessoaTipo'); 
    Route::get('/getconsultaVeiculoPortaria', [CidadePController::class, 'index'])->name('getconsultaVeiculoPortaria'); 
    Route::get('/getArq', [CidadePController::class, 'index'])->name('getArq'); 
    Route::get('/getPonto', [CidadePController::class, 'index'])->name('getPonto'); 
    Route::get('/getRequisicao', [CidadePController::class, 'index'])->name('getRequisicao'); 
    Route::get('/frmRecadoChamado', [CidadePController::class, 'index'])->name('frmRecadoChamado'); 
    Route::get('/gridRecadoChamado', [CidadePController::class, 'index'])->name('gridRecadoChamado'); 
    Route::get('/recadoChamadoGridChamado', [CidadePController::class, 'index'])->name('recadoChamadoGridChamado'); 
    Route::get('/controleDeAcesso', [CidadePController::class, 'index'])->name('controleDeAcesso');     
    Route::get('/getCadastroMAC', [CidadePController::class, 'index'])->name('getCadastroMAC');
    Route::get('/configuracaoPergunta', [CidadePController::class, 'index'])->name('configuracaoPergunta');
    Route::get('/monitorLog', [CidadePController::class, 'index'])->name('monitorLog');
    Route::get('/getApuracaoLogUsuario', [CidadePController::class, 'index'])->name('getApuracaoLogUsuario');
    Route::get('/getTravaSistema', [CidadePController::class, 'index'])->name('getTravaSistema');


    Route::get('/cidadep/create', [DadosVeiculoController::class, 'create'])->name('cidadep.create');
    Route::post('/cidadep', [DadosVeiculoController::class, 'store'])->name('cidadep.store');

Route::get('/cidadep/{id}', [DadosVeiculoController::class, 'show'])->name('cidadep.show');

Route::get('/cidadep/{id}/edit', [DadosVeiculoController::class, 'edit'])->name('cidadep.edit');
Route::put('/cidadep/{id}', [DadosVeiculoController::class, 'update'])->name('cidadep.update');
Route::delete('/cidadep/{id}', [DadosVeiculoController::class, 'destroy'])->name('cidadep.destroy');
Route::get('/produtos/pesquisa',  [DadosVeiculoController::class, 'pesquisa']);
   


});

require __DIR__.'/auth.php';
