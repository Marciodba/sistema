<link href="{{ asset('vendor/bladewind/css/animate.min.css') }}" rel="stylesheet" />
<link href="{{ asset('vendor/bladewind/css/bladewind-ui.min.css') }}" rel="stylesheet" />
<script src="{{ asset('vendor/bladewind/js/helpers.js') }}"></script>
<script src="//unpkg.com/alpinejs" defer></script>

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
    exclude_columns="id,uid,idestadop,dtlixo"
    :action_icons="$action_icons"
    action_title="Acao"
    hover_effect="true"/>

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
    domEl('.bw-send-message .modal-title').innerText = `Mensagem para ${nome} ${uf}`;
}

deleteUser = (id, nome, uf) => {
    showModal('delete-user');
    domEl('.bw-delete-user .title').innerText = `${nome} ${uf}`;
}

redirect = (url) => {
    window.open(url);
}
    </script>