<x-app-layout>
    @csrf
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard  Bem Vindo ') }}

        </h2>
    
        
    </x-slot>
 
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
              
           
                <div class="p-6 text-gray-900 dark:text-gray-100">
                     <div class="content-modulos-home">
                      
                        
                         @foreach($vpessoaUsuarios as $vpessoaUsuario)
                      
                                <a href="{{ route($vpessoaUsuario->funcao, [ $vpessoaUsuario->functionid ,$vpessoaUsuario->nome_menu ,$vpessoaUsuario->inclui , $vpessoaUsuario->edita , $vpessoaUsuario->deleta])}}"> <img src="data:image/png;base64,{{ $img_icones[$vpessoaUsuario->icone]}}"  width="48" height="48"
                                    ></a>
                                    <span> {{$vpessoaUsuario->nome_menu}}</span>
                                    <span> </span>
                                </a>
                        
                           
                            @endforeach
                        </div>

                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
