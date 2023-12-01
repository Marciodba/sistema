<?php

use App\Models\CidadeP;
use App\Models\VpessoaUsuario;
use App\Models\ProdutoFornecedor;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PessoaController;
use App\Http\Controllers\CidadePController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VprodutoController;
use App\Http\Controllers\V1\CarrinhoController;
use App\Http\Controllers\VpessoaGeralController;
use App\Http\Controllers\V1\ProdutoSiteController;
use App\Http\Controllers\VpessoaUsuarioController;
use App\Http\Controllers\V1\CupomDescontoController;
use App\Http\Controllers\ProdutoFornecedorController;

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


Route::get('/', [PessoaController::class, 'index']);
Route::get('/produto_cliente/{id}', [ProdutoFornecedorController::class, 'fornecedorDE'])->name('bemvindo');
Route::get('/dashboard', function () {

    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [VpessoaUsuarioController::class, 'index'])->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/produto_fornecedor/{idmenusbb}/{titulo}/{inclui}/{edita}/{deleta}', [ProdutoFornecedorController::class, 'ler'])->name('getCadastroItinerario');
    Route::get('/produto_fornecedor/{id}', [ProdutoFornecedorController::class, 'update'])->name('produto_fornecedor.update');

    Route::get('/produtopreco/{idmenusbb}/{titulo}/{inclui}/{edita}/{deleta}', [VprodutoController::class, 'index'])->name('getCadastroPassagens');
    Route::get('/produtopreco/{id}/edit', [VprodutoController::class, 'edit'])->name('produtopreco.edit');
    Route::put('/produtopreco/{id}', [VprodutoController::class, 'update'])->name('produtopreco.update');
    Route::get('/cidade', [CidadePController::class, 'filtro'])->name('filtro');
    Route::delete('/cidade/{id}', [CidadePController::class, 'destroy'])->name('cidade.destroy');
    Route::get('/getPessoaGeral/{idmenusbb}/{titulo}/{inclui}/{edita}/{deleta}', [VpessoaGeralController::class, 'index'])->name('getPessoaGeral');
    Route::get('/vpessoageral/{id}/edit', [VpessoaGeralController::class, 'edit'])->name('vpessoageral.edit');
    Route::get('/vpessoageral/{id}', [VpessoaGeralController::class, 'update'])->name('vpessoageral.update');

    Route::get('/getVenda/{idmenusbb}/{titulo}/{inclui}/{edita}/{deleta}', [CidadePController::class, 'index'])->name('getVenda');
    Route::get('/getVendaBalcao', [CidadePController::class, 'index'])->name('getVendaBalcao');
    Route::get('/getCaixa/{idmenusbb}/{titulo}/{inclui}/{edita}/{deleta}', [CidadePController::class, 'index'])->name('getCaixa');
    Route::get('/getVendaReceberSangriaGrid', [CidadePController::class, 'index'])->name('getVendaReceberSangriaGrid');
    Route::get('/alterarSenha/{idmenusbb}/{titulo}/{inclui}/{edita}/{deleta}', [CidadePController::class, 'index'])->name('alterarSenha');
    Route::get('/getCadastroUnidade/{idmenusbb}/{titulo}/{inclui}/{edita}/{deleta}', [CidadePController::class, 'index'])->name('getCadastroUnidade');
    Route::get('/getCadastroEstado/{idmenusbb}/{titulo}/{inclui}/{edita}/{deleta}', [CidadePController::class, 'index'])->name('getCadastroEstado');
    Route::get('/getCadastroIpi/{idmenusbb}/{titulo}/{inclui}/{edita}/{deleta}', [CidadePController::class, 'index'])->name('getCadastroIpi');
    Route::get('/getCaixaUnicoLinhaVeiculo/{idmenusbb}/{titulo}/{inclui}/{edita}/{deleta}', [CidadePController::class, 'index'])->name('getCaixaUnicoLinhaVeiculo');
    Route::get('/getVeiculo/{idmenusbb}/{titulo}/{inclui}/{edita}/{deleta}', [CidadePController::class, 'index'])->name('getVeiculo');
    Route::get('/getCargaVeiculomulta/{idmenusbb}/{titulo}/{inclui}/{edita}/{deleta}', [CidadePController::class, 'index'])->name('getCargaVeiculomulta');
    Route::get('/getVApuraOsCmSys/{idmenusbb}/{titulo}/{inclui}/{edita}/{deleta}', [CidadePController::class, 'index'])->name('getVApuraOsCmSys');
    Route::get('/getEscala/{idmenusbb}/{titulo}/{inclui}/{edita}/{deleta}', [CidadePController::class, 'index'])->name('getEscala');
    Route::get('/getCadastroGrupo/{idmenusbb}/{titulo}/{inclui}/{edita}/{deleta}', [CidadePController::class, 'index'])->name('getCadastroGrupo');
    Route::get('/getCadastroItinerario/{idmenusbb}/{titulo}/{inclui}/{edita}/{deleta}', [CidadePController::class, 'index'])->name('verificar_1');
    Route::get('/getApuraOperacao', [CidadePController::class, 'index'])->name('getApuraOperacao');
    Route::get('/getComprasSolicitacao/{idmenusbb}/{titulo}/{inclui}/{edita}/{deleta}', [CidadePController::class, 'index'])->name('getComprasSolicitacao');
    Route::get('/getCompra/{idmenusbb}/{titulo}/{inclui}/{edita}/{deleta}', [CidadePController::class, 'index'])->name('getCompra');
    Route::get('/getRecadoChamado/{idmenusbb}/{titulo}/{inclui}/{edita}/{deleta}', [CidadePController::class, 'index'])->name('getRecadoChamado');
    Route::get('/getPessoaTipo/{idmenusbb}/{titulo}/{inclui}/{edita}/{deleta}', [CidadePController::class, 'index'])->name('getPessoaTipo');
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
    Route::get('/setarMensagemLoginUsuario', [CidadePController::class, 'index'])->name('setarMensagemLoginUsuario');
    Route::get('/getMensagemInstantanea', [CidadePController::class, 'index'])->name('getMensagemInstantanea');
    Route::get('/getCV', [CidadePController::class, 'index'])->name('getCV');
    Route::get('/getCadastroFornecedor', [CidadePController::class, 'index'])->name('getCadastroFornecedor');
    Route::get('/getPessoaProdutoVidaValidador', [CidadePController::class, 'index'])->name('getPessoaProdutoVidaValidador');
    Route::get('/getRecadoGrupo', [CidadePController::class, 'index'])->name('getRecadoGrupo');
    Route::get('/getCadastroPessoaCliente', [CidadePController::class, 'index'])->name('getCadastroPessoaCliente');
    Route::get('/getCadastroPessoaRamo', [CidadePController::class, 'index'])->name('getCadastroPessoaRamo');
    Route::get('/getOS', [CidadePController::class, 'index'])->name('getOS');
    Route::get('/getVendaReceberCanceladoGrid', [CidadePController::class, 'index'])->name('getVendaReceberCanceladoGrid');
    Route::get('/getMenu', [CidadePController::class, 'index'])->name('getMenu');
    Route::get('/getVApuraPesquisa', [CidadePController::class, 'index'])->name('getVApuraPesquisa');
    Route::get('/getPerguntaResposta', [CidadePController::class, 'index'])->name('getPerguntaResposta');
    Route::get('/getVConsultaKM', [CidadePController::class, 'index'])->name('getVConsultaKM');
    Route::get('/getVidaUtil', [CidadePController::class, 'index'])->name('getVidaUtil');
    Route::get('/getVendaReceberGrid', [CidadePController::class, 'index'])->name('getVendaReceberGrid');
    Route::get('/getCargaMeiaViagem', [CidadePController::class, 'index'])->name('getCargaMeiaViagem');
    Route::get('/getCargaSpTrans', [CidadePController::class, 'index'])->name('getCargaSpTrans');
    Route::get('/getVApuraPesquisa', [CidadePController::class, 'index'])->name('getVApuraPesquisa');
    Route::get('/getVApuraPesquisa', [CidadePController::class, 'index'])->name('getVApuraPesquisa');
    Route::get('/getRecadoCanalComunicacao', [CidadePController::class, 'index'])->name('getRecadoCanalComunicacao');
    Route::get('/consultaBordo', [CidadePController::class, 'index'])->name('consultaBordo');
    Route::get('/consultaTac2', [CidadePController::class, 'index'])->name('consultaTac2');
    Route::get('/consultaTac', [CidadePController::class, 'index'])->name('consultaTac');
    Route::get('/ConsultaApuracaoServico', [CidadePController::class, 'index'])->name('ConsultaApuracaoServico');
    Route::get('/consultaVeiculoColeta', [CidadePController::class, 'index'])->name('consultaVeiculoColeta');
    Route::get('/veiculoColetaTopN', [CidadePController::class, 'index'])->name('veiculoColetaTopN');
    Route::get('/getconsultaSgg', [CidadePController::class, 'index'])->name('getconsultaSgg');
    Route::get('/consultaCartaoSgg', [CidadePController::class, 'index'])->name('consultaCartaoSgg');
    Route::get('/consultaCartaoFraude', [CidadePController::class, 'index'])->name('consultaCartaoFraude');
    Route::get('/consultaMeiaViagem', [CidadePController::class, 'index'])->name('consultaMeiaViagem');
    Route::get('/getApuraPicoHora', [CidadePController::class, 'index'])->name('getApuraPicoHora');
    Route::get('/getCartaoTotal', [CidadePController::class, 'index'])->name('getCartaoTotal');
    Route::get('/getlinhaTotal', [CidadePController::class, 'index'])->name('getlinhaTotal');


    //carrinho de compras
    Route::get('produtos', [ProdutoSiteController::class,'listaProduto'])->name('produtos');
    //Criando ROTA para o controller ProdutoController
    Route::get('produto/lista', [ProdutoSiteController::class,'index'])->name('produto.lista');
    Route::post('produto/store', [ProdutoSiteController::class,'store'])->name('produto.store');

    Route::get('cupom/desconto/listar', [CupomDescontoController::class,'index'])->name('cupom.desconto.listar');
    Route::post('cupom/desconto/store', [CupomDescontoController::class,'store'])->name('cupom.desconto.store');

    //Criando as ROTAS para o carrinho de compras
    Route::get('carrinho/index', [CarrinhoController::class,'index'])->name('carrinho.index');

    Route::get('carrinho/show/{value}', [CarrinhoController::class,'show'])->name('carrinho.show');
    Route::post('carrinho/store', [CarrinhoController::class,'store'])->name('carrinho.store');

    Route::delete('carrinho/remover', [CarrinhoController::class,'remover'])->name('carrinho.remover');
    Route::post('carrinho/produto/adicionar', [CarrinhoController::class,'addProduto'])->name('carrinho.produto.adicionar');

    Route::post('concluir/compras', [CarrinhoController::class,'concluir'])->name('concluir.compras');
    Route::get('compras', [CarrinhoController::class,'compras'])->name('compras');
    ///fim carrinho

});

require __DIR__ . '/auth.php';
