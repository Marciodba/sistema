{{-- <input type="text" value="{{ csrf_token()}}" name="_token"> --}}
@csrf   
<div>
    <div> <img src="{!! asset('https://drive.google.com/file/d/12vTFBrMZ5hGyLFTTf5ielwlGOmoK-Sfr/view?usp=sharing') !!}"></div>
 
<input type="text" placeholder="Nome" name="nome" value="{{ $cidade->nome ?? old('nome')}}">
<input type="text" placeholder="uf" name="uf" value="{{ $cidade->uf ?? old('uf')}}">
</div>

<button type="submit" >Enviar</button>


