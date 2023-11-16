
<x-alert/>
<form action="{{route('produtopreco.update',$produtopreco[0]->produtoprecoid)}}" method="POST">

@method('put')
@include('produtopreco.partials.form',[
    'produtopreco'=>$produtopreco
])

</form>