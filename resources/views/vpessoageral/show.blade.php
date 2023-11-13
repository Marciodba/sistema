<div id="cabecalho">
    <img src="{!! asset('https://drive.google.com/file/d/12vTFBrMZ5hGyLFTTf5ielwlGOmoK-Sfr/view?usp=sharing') !!}">
    <h1>Vistória  {{ $cidade->id}}</h1>
    <h1>Data que foi gerado {{ date( 'd/m/Y' , strtotime($cidade->dtatualizacao))}}</h1></div>
<div id="corpo">
    <ul>
        <li>Nome : {{ $cidade->nome }}</li>
        <li>Cpf : {{ $cidade->cpf  }}</li>
        <li>Rg : {{ $cidade->rg  }}</li>
   


       
    </ul>
</div>
<div id="rodape">
    <ul>
        <li>Endereço: Rua dr Baeta Neves n° 114 – Baeta Neves - São Bernardo do Campo - 09784-260</li>

        <li> E-mail: suporte@vistoriago.com.br </li>
        <li><img src="{!! asset('https://drive.google.com/file/d/12vTFBrMZ5hGyLFTTf5ielwlGOmoK-Sfr/view?usp=sharing') !!}"></li>
                    


    </ul>

    <form action="{{ route('cidade.destroy',$cidade->id)}}" method="POST">
        @csrf
        @method('DELETE')
        
    <button type="submit">Deletar</button>
    <input type="button" value="Imprimir" onClick="window.print()"/>
</form></div>






   

            
