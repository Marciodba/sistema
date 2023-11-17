<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Produto;
use App\Models\ProdutoPreco;
use Illuminate\Http\Request;
use App\Models\ProdutoGruposbb;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
use App\Http\Controllers\padrao\IdiomaDetalhePController;

class VprodutoController extends Controller
{
    private $filtro;
    private $filtrousuario;

    public function index($functionid,$titulo,$inclui,$edita,$deleta)
   
    {
      
        $menuSbbConfigController = new MenuSbbConfigController;
       $filtro = $menuSbbConfigController->ver($functionid);
     
        $idiomaDetalhePController = new IdiomaDetalhePController;
        $column_aliases = $idiomaDetalhePController->lerDicionario(['produto', 'produtopreco','produtogruposbb'], true);
       
        $mostra_coluna =  array_keys($column_aliases);
   
        $mostra_coluna =  implode(',', $mostra_coluna);
   
        $produtoprecos = ProdutoPreco::select('produto.id AS produtoid',
        'produto.uid AS produtouid',
         'produto.codigo AS produtocodigo', 
         'produto.nome AS produtonome', 
        'produto.ativo AS produtoativo', 
        DB::raw("to_char(produto.dtcad,'dd/mm/yyyy') as produtodtcad"), 
        'produto.idgruposbb AS produtoidgruposbb', 
        'produto.observacao AS produtoobservacao', 
        'produto.estoqueminimo AS produtoestoqueminimo',
         'produto.comprarqtde AS produtocomprarqtde',
         DB::raw("to_char(produto.dtatualizacao,'dd/mm/yyyy') as produtodtatualizacao"), 
        'produto.codigobarra AS produtocodigobarra', 
        'produto.idunidade AS produtoidunidade', 
        'produto.codigofabricante AS produtocodigofabricante',
        'produto.idmodelo AS produtoidmodelo', 
        'produto.dtlixo AS produtodtlixo', 
       'produto.detalhe as produtodetalhe',
       'produto.lucro as produtolucro',
        'produto.precounitario as produtoprecounitario',
       'produto.saldototal as produtosaldototal',
       'produto.tempogarantia as produtotempogarantia',
       'produto.tempopreparo as produtotempopreparo',
        'produtogruposbb.id AS produtogruposbbid',
        'produtogruposbb.uid AS produtogruposbbuid',
               'produtogruposbb.idprodutogruposub AS produtogruposbbidprodutogruposub',
        'produtogruposbb.codigo AS produtogruposbbcodigo', 
        'produtogruposbb.nome AS produtogruposbbnome', 
        'produtogruposbb.km AS produtogruposbbkm',
        'produtogruposbb.dtlixo AS produtogruposbbdtlixo', 
        'produtogruposbb.dtatualizacao AS produtogruposbbdtatualizacao',
       'produtopreco.dtatualizacao as produtoprecodtatualizacao' ,
       'produtopreco.dtcad as produtoprecodtcad' ,
       'produtopreco.dtemissao as produtoprecodtemissao' ,
       'produtopreco.dtlixo as produtoprecodtlixo' ,
       'produtopreco.id as produtoprecoid' ,
       'produtopreco.uid as produtoprecouid' ,
       'produtopreco.idempresa as produtoprecoidempresa' ,
       'produtopreco.idproduto as produtoprecoidproduto' ,
       'produtopreco.idunidade as produtoprecoidunidade' ,
       'produtopreco.preco as produtoprecopreco' ,
       'produtopreco.qtde as produtoprecoqtde')->Join('produto', 'produto.id', '=', 'produtopreco.idproduto')
        ->Join('produtogruposbb', 'produtogruposbb.id', '=', 'produto.idgruposbb')
        ->Join('setorgruposbbproduto', 'setorgruposbbproduto.idproduto', '=', 'produto.id')
      ->where('produto.id', '>', '0')->whereRaw(DB::RAW($filtro))->orderBy('produto.dtatualizacao','DESC')->limit(20)->get();

        $action_icons = [];

        $action_icons = [
            "icon:chat-bubble-left | tip:send user a message | color:green | click:sendMessage('{produtonome}', '{produtocodigo}')",
            "icon:pencil | click:redirect('/produtopreco/{produtoprecoid}/edit')",
            "icon:trash | color:red | click:deleteProduto({produtoprecoid}, '{produtonome}', '{produtocodigo}')",
        ];

    
        return view('produtopreco/index',compact(['action_icons','produtoprecos','column_aliases','mostra_coluna'
        ,'titulo','inclui','edita','deleta']));
    }

    public function edit(ProdutoPreco $cidadep, string | int $id)
    {
   
        if (!$produtopreco = ProdutoPreco::select('produto.id AS produtoid',
        'produto.uid AS produtouid',
         'produto.codigo AS produtocodigo', 
         'produto.nome AS produtonome', 
        'produto.ativo AS produtoativo', 'produto.dtcad AS produtodtcad', 
        'produto.idgruposbb AS produtoidgruposbb', 
        'produto.observacao AS produtoobservacao', 
        'produto.estoqueminimo AS produtoestoqueminimo',
         'produto.comprarqtde AS produtocomprarqtde',
          'produto.dtatualizacao AS produtodtatualizacao', 
        'produto.codigobarra AS produtocodigobarra', 
        'produto.idunidade AS produtoidunidade', 
        'produto.codigofabricante AS produtocodigofabricante',
        'produto.idmodelo AS produtoidmodelo', 
        'produto.dtlixo AS produtodtlixo', 
       'produto.detalhe as produtodetalhe',
       'produto.lucro as produtolucro',
        'produto.precounitario as produtoprecounitario',
       'produto.saldototal as produtosaldototal',
       'produto.tempogarantia as produtotempogarantia',
       'produto.tempopreparo as produtotempopreparo',
        'produtogruposbb.id AS produtogruposbbid',
        'produtogruposbb.uid AS produtogruposbbuid',
               'produtogruposbb.idprodutogruposub AS produtogruposbbidprodutogruposub',
        'produtogruposbb.codigo AS produtogruposbbcodigo', 
        'produtogruposbb.nome AS produtogruposbbnome', 
        'produtogruposbb.km AS produtogruposbbkm',
        'produtogruposbb.dtlixo AS produtogruposbbdtlixo', 
        'produtogruposbb.dtatualizacao AS produtogruposbbdtatualizacao',
       'produtopreco.dtatualizacao as produtoprecodtatualizacao' ,
       'produtopreco.dtcad as produtoprecodtcad' ,
       'produtopreco.dtemissao as produtoprecodtemissao' ,
       'produtopreco.dtlixo as produtoprecodtlixo' ,
       'produtopreco.id as produtoprecoid' ,
       'produtopreco.uid as produtoprecouid' ,
       'produtopreco.idempresa as produtoprecoidempresa' ,
       'produtopreco.idproduto as produtoprecoidproduto' ,
       'produtopreco.idunidade as produtoprecoidunidade' ,
       'produtopreco.preco as produtoprecopreco' ,
       'produtopreco.qtde as produtoprecoqtde')->Join('produto', 'produto.id', '=', 'produtopreco.idproduto')
        ->Join('produtogruposbb', 'produtogruposbb.id', '=', 'produto.idgruposbb')
    ->where('produtopreco.id',  $id)->get()) {
            return redirect()->back();
        }
        $produtogruposbbs = ProdutoGruposbb::All();
        $grupos=[];
        foreach ($produtogruposbbs as $value) {
            
            $grupos[] =[ 
                'code' => $value->id,
                'codigo' => $value->codigo
            ];
     
        }
   

        return view('produtopreco/edit', compact('produtopreco','grupos'));
    }

    public function update(Request $request, string  $id)
    {
        $data = $request->all();
      
        if (!$produtoPreco =  ProdutoPreco::find($id)) {
            return redirect()->back();
        }
        $produtoPreco->preco =$data['preco'];
        $produtoPreco->dtatualizacao = now();
        $produto =  Produto::find($produtoPreco->idproduto);

        $produto->codigobarra=$data['codigobarra'];
        $produto->nome=$data['nome'];
        $produto->idgruposbb=$data['classificacao'];
        if(empty($data['classificacao'])){
            $produto->idgruposbb=1;
        }
       
        $produto->observacao=$data['observacao'];
        $produto->dtatualizacao = now();
        $produto->save();
        
      
        

        $produtoPreco->save();
       


        return redirect()->route('getCadastroPassagens');
    }
}
