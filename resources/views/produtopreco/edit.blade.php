
<h1>Alterar Vistória </h1>
<x-alert/>
<form action="{{route('produtopreco.update',6)}}" method="POST">

@method('put')
@include('produtopreco.partials.form',[
    'produtopreco'=>$produtopreco
])

</form>