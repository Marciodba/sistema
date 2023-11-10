<input type="email"
        name="email"
        value="email@laravel.com"
 />

<form action="#" name="form_estado_gnre" id="form_estado_gnre" onsubmit="return false">
    @csrf
    <h3>Garagem</h3>
    <div class="content-fields">
        <div class="row">
                <div class="col-lg-2">
                  {{ Form::text('estado', '', ['id' => 'estado', 'class' => 'form-control input-label', 'placeholder' => 'Estado', 'maxlength' => '2']) }}
                </div>

        </div>

    </div>
    <div class="content-buttons">
        <button name="btn-filterform" id="btn-filterform" class="btn-filter">Buscar</button>
        <input type="reset" name="btn-clearform" id="btn-clearform" class="btn-clear" value="Limpar busca" />
        <button name="btn-create" id="btn-create" class="btn-create">Adicionar</button>
    </div>
</form>




<div class="content-table">

    <table class="table table-striped" id="table-filters-estado_gnre">
        <thead>
            <tr>
                <th>NOme</th>
                <th>UF</th>
                <th>ibge</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cidades as $cidade)
            <tr>
                <td>{{ $cidade->nome}}</td>
                <td>{{ $cidade->uf }}</td>
                <td>{{ $cidade->ibge }}</td>
                <td>
                    <a href="{{route('cidadep.show',$cidade->id)}}">ver</a>
                    <a href="{{route('cidadep.edit',$cidade->id)}}">editar</a>
                </td>
            </tr>
           
        @endforeach
        </tbody>
    </table>
</div>



<h1>Listagem dos Cidades</h1>

<a href="{{route('cidadep.create')}}">Adicionar</a>
<a  href="{{ url()->previous() }}">
    <i class="fa fa-arrow-circle-o-left"></i>
    <span>Voltar</span>
</a>
<table>
    <thead>
        <th>NOme</th>
        <th>UF</th>
        <th>ibge</th>
        <th></th>
    </thead>
    <tbody>
      
        @foreach ($cidades as $cidade)
            <tr>
                <td>{{ $cidade->nome}}</td>
                <td>{{ $cidade->uf }}</td>
                <td>{{ $cidade->ibge }}</td>
                <td>
                    <a href="{{route('cidadep.show',$cidade->id)}}">ver</a>
                    <a href="{{route('cidadep.edit',$cidade->id)}}">editar</a>
                </td>
            </tr>
           
        @endforeach
    </tbody>
</table>


