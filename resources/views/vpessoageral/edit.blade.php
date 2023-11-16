
<x-alert/>
<form action="{{route('vpessoageral.update',1)}}" method="POST">
    @csrf
@method('put')
@include('vpessoageral.partials.form',[
    'vpessoageral'=>$vpessoageral
])

</form>