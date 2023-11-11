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
    include_columns="pessoacgc,pessoagruposbbcodigo,pessoadtcad,pessoaapelido,pessoanome"
    :action_icons="$action_icons"
    action_title="Acao"
    hover_effect="true"/>
</div>
    <x-bladewind::modal name="send-message" title="">
        <div class="mb-6">Alterar Mensagem</div>
        <x-bladewind::textarea placeholder="Enviar mensagem.." rows="5" />
    </x-bladewind::modal>
    
    <x-bladewind::modal name="delete-user" type="error" title="Confirma Exclusão">
        Apagar Registro <b class="title"></b>?
       
    </x-bladewind::modal>
<script>
sendMessage = (nome, uf) => {
    showModal('send-message');
    domEl('.bw-send-message .modal-title').innerText = `Mensagem para ${pessoanome} ${pessoaapelido}`;
}

deleteUser = (id, nome, uf) => {
    showModal('delete-user');
    domEl('.bw-delete-user .title').innerText = `${pessoanome} ${pessoaapelido}`;
}

redirect = (url) => {
    window.open(url);
}
    </script>