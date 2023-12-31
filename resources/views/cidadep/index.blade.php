<link href="{{ asset('vendor/bladewind/css/animate.min.css') }}" rel="stylesheet" />
<link href="{{ asset('vendor/bladewind/css/bladewind-ui.min.css') }}" rel="stylesheet" />
<script src="{{ asset('vendor/bladewind/js/helpers.js') }}"></script>
<script src="//unpkg.com/alpinejs" defer></script>
<meta name="viewport" content="width=device-width, initial-scale=1">




<x-bladewind.centered-content size="tiny">

    <x-bladewind.card>
        {{$titulo}}
    </x-bladewind.card>

</x-bladewind.centered-content>
<x-bladewind.button  onclick="alert('Inclui')" size="tiny">Novo</x-bladewind.button>

{{--<x-bladewind.button  onclick="window.location='{{ route('filtro',[ {{$titulo}}]) }}'"  size="tiny">Filtro</x-bladewind.button> --}}
<x-bladewind.button    size="tiny">Filtro</x-bladewind.button>
<x-bladewind.button size="tiny">Enviar</x-bladewind.button>
<x-bladewind.button  onclick="window.print()" size="tiny">Imprimir</x-bladewind.button>
<x-bladewind.button   onclick="window.location='{{ route('dashboard') }}'" size="tiny">Voltar</x-bladewind.button>
    <x-bladewind::table
    striped="true"
    divided="true"
    divider="thin"
    has_shadow="true"
    compact="true"
    searchable="true"
    search_placeholder="Pesquisa.."
    name="cidades-table"
    :data="$cidades"
    :action_icons="$action_icons"
    :column_aliases="$column_aliases"
    :include_columns="$mostra_coluna"
    action_title="Acao"
    hover_effect="true"
    />

    
    <x-bladewind.button onclick="showModal('info')">
        Info Modal
    </x-bladewind.button>
    
    <x-bladewind.modal
        type="info"
        title="General Info"
        name="info">
        We really think you should buy some Bitcoin
        despite it's ups and dowms. What sayeth thou?
    </x-bladewind.modal>

    <x-bladewind.modal name="apagar" type="error" title="Confirme Exclusão">
      
            Excluir  {{$titulo}}   <b class="title"></b>?
           

</x-bladewind.modal>
    
 
<script>


destroy  = (id,nome) => {
   showModal('apagar');
    domEl('.bw-apagar .title').innerText = `${nome}`;
}

redirect = (url) => {
    window.open(url);
}

    </script>