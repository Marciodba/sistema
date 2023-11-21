<?php

namespace App\Http\Controllers;

use App\Models\ArqFisico;
use App\Models\ArqFisicoCli;
use Illuminate\Http\Request;
use App\Models\ProdutoFornecedor;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\padrao\IdiomaDetalhePController;

class ProdutoFornecedorController extends Controller
{
    public function index()
    {


        $produtoFornecedors = ProdutoFornecedor::with(['pessoa', 'produto', 'endereco' => function ($query) {
            $query->whereNotNull(['observacao']);
        }])->where('padrao', true)->orderBy('dtatualizacao','DESC')->limit(500)->get();
        $img_icones = [];
      
        if (!empty($produtoFornecedors[0]) && !empty($produtoFornecedors[0]->pessoa)) {


            $icones = $produtoFornecedors[0]->pessoa->pluck('apelido');
    
            $icones_prod = $produtoFornecedors->pluck('codigo');
            $arqFisicos = ArqFisicoCli::select(DB::RAW("encode(arqfoto, 'base64') as imagem,codnome"))->whereIn('codnome', $icones)
            ->orwhereIn('codnome', $icones_prod)->get();
     
            foreach ($arqFisicos as $arqFisico) {

                $img_icones[$arqFisico->codnome] = $arqFisico->imagem;
            }
       
        }
  
        return view('welcome', compact('produtoFornecedors', 'img_icones'));
    }

    public function ler($functionid,$titulo,$inclui,$edita,$deleta)
    {

        $menuSbbConfigController = new MenuSbbConfigController;
        $filtro = $menuSbbConfigController->ver($functionid);
        $menuPermissaoController = new MenuPermissaoController;
        $filtrousuario = $menuPermissaoController->ver($functionid);

        $idiomaDetalhePController = new IdiomaDetalhePController;
        $column_aliases = $idiomaDetalhePController->ler(['produtofornecedor'],true);
      //tratamento de coluna edição e grid
         $mostra_coluna =  array_keys($column_aliases);
         $altera_coluna =  implode("}','{",$mostra_coluna);
            $altera_coluna ="'{id}','{" .$altera_coluna."}'";
            $mostra_coluna =  implode(',',$mostra_coluna);

           $produtoFornecedors = ProdutoFornecedor::where('padrao', true)->where('idpessoa',Auth::user()->idpessoa)
        ->whereRaw(DB::RAW($filtro))->whereRaw(DB::RAW($filtrousuario))->limit(100)->orderBy('dtatualizacao','DESC')->get();


       
        $action_icons = [
            "icon:pencil | click:formmode($altera_coluna)",
            "icon:trash | color:red | click:destroy({id},'{descricao}')",
        ];

   

       return view('produto_fornecedor/ler',compact(['produtoFornecedors', 'action_icons','column_aliases','mostra_coluna'  
       ,'titulo','inclui','edita','deleta']));
    }

    
    public function update(Request $request)
    {   
   
       

        $data = $request->all();
    
        if(!empty($data['id'])){
            $objEntidade =  ProdutoFornecedor::find($data['id']);
        }else{
            $objEntidade = new   ProdutoFornecedor;
            $objEntidade->idproduto=1;
            $objEntidade->idunidade=1;
            $objEntidade->qtdepedido=1;
            $objEntidade->qtdeestoque=1;
            $objEntidade->idpessoa=Auth::user()->idpessoa;
            $objEntidade->dtpedido = now();
        }
       

    
     
        $objEntidade->codigo = $data['codigo'];
        $objEntidade->descricao = $data['descricao'];
        $objEntidade->site = $data['site'];
    
        $objEntidade->dtatualizacao = now();

        if(!empty($data['padrao'])){
          
            $objEntidade->padrao = $data['padrao'];
        }else{
            $objEntidade->padrao = true;
        }
    

     

     
        $objEntidade->save();
        
        return redirect()->back();
      
    }

    public function destroy(string | int $id)
    {

        if (!$objEntidade =  ProdutoFornecedor::find($id)) {
            return redirect()->back();
        }
     
        $objEntidade->delete();

        return redirect()->back();
    }
}
