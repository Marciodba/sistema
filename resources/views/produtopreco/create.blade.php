<h1>Nova Vistória</h1>
<x-alert/>


<form action="{{route('cidade.store')}}" method="POST">
    @include('cidade.partials.form')
</form>