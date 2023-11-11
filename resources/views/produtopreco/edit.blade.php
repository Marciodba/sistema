
<h1>Alterar Vistória {{ $cidade->id}}</h1>
<x-alert/>
<form action="{{route('cidade.update',$cidade->id)}}" method="POST">

@method('put')
@include('cidade.partials.form',[
    'cidade'=>$cidade
])

</form>