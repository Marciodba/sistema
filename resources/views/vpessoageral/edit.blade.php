
<x-alert/>
<form action="{{route('vpessoageral.update',1)}}" method="POST">

@method('put')
@include('vpessoageral.partials.form',[
    'vpessoageral'=>$vpessoageral
])

</form>