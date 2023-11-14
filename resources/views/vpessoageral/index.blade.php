<link href="{{ asset('vendor/bladewind/css/animate.min.css') }}" rel="stylesheet" />
<link href="{{ asset('vendor/bladewind/css/bladewind-ui.min.css') }}" rel="stylesheet" />
<script src="{{ asset('vendor/bladewind/js/helpers.js') }}"></script>
<script src="//unpkg.com/alpinejs" defer></script>
<meta name="viewport" content="width=device-width, initial-scale=1">

<div style="overflow-x:auto;">
    <x-bladewind::table
    striped="true"
    divided="true"
    divider="thin"
    has_shadow="true"
    compact="true"
    searchable="true"
    search_placeholder="Pesquisa.."
    name="vpessoageral-table"
    :data="$vpessoagerais"
    :action_icons="$action_icons"
    :column_aliases="$column_aliases"
    :include_columns="$mostra_coluna"
    action_title="Acao"
    hover_effect="true"/>
</div>
   
<script>
modalEdit = (pessoanome) => {
    alert(pessoanome);

   
}

deleteUser = (id, nome, uf) => {
    showModal('delete-user');
    domEl('.bw-delete-user .title').innerText = `${pessoanome} ${pessoaapelido}`;
}

redirect = (url) => {
    window.open(url);
}
    </script>