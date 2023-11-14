<link href="{{ asset('vendor/bladewind/css/animate.min.css') }}" rel="stylesheet" />
<link href="{{ asset('vendor/bladewind/css/bladewind-ui.min.css') }}" rel="stylesheet" />
<script src="{{ asset('vendor/bladewind/js/helpers.js') }}"></script>
<script src="//unpkg.com/alpinejs" defer></script>
<meta name="viewport" content="width=device-width, initial-scale=1">
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
    
    
 
<script>
sendMessage = (nome, uf) => {
    showModal('info');
    ${nome} ${uf};
}

deleteUser = (id, nome, uf) => {
    showModal('delete-user');
    domEl('.bw-delete-user .title').innerText = `${nome} ${uf}`;
}

redirect = (url) => {
    window.open(url);
}
    </script>