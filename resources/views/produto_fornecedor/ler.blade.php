<link href="{{ asset('vendor/bladewind/css/animate.min.css') }}" rel="stylesheet" />
<link href="{{ asset('vendor/bladewind/css/bladewind-ui.min.css') }}" rel="stylesheet" />
<script src="{{ asset('vendor/bladewind/js/helpers.js') }}"></script>
<script src="//unpkg.com/alpinejs" defer></script>
<meta name="viewport" content="width=device-width, initial-scale=1">
@csrf
<x-bladewind.centered-content size="tiny">

    <x-bladewind.card>
        {{$titulo}}
    </x-bladewind.card>
  
</x-bladewind.centered-content>

<x-bladewind.button  onclick="formmodeInclui()" size="tiny">Novo</x-bladewind.button>

<x-bladewind.button   size="tiny">Filtro</x-bladewind.button>
<x-bladewind.button size="tiny">Enviar</x-bladewind.button>
<x-bladewind.button  size="tiny">Imprimir</x-bladewind.button>
<x-bladewind.button  size="tiny">Voltar</x-bladewind.button>


<div style="overflow-x:auto;">
    <x-bladewind.table striped="true" divided="true" divider="thin" has_shadow="true" compact="true" searchable="true"
        search_placeholder="Pesquisa.." name="produtoFornecedor-table" :data="$produtoFornecedors" :action_icons="$action_icons"
        :column_aliases="$column_aliases" :include_columns="$mostra_coluna" action_title="Acao" hover_effect="false" />
</div>
<div>
    <x-bladewind::modal size="xl" backdrop_can_close="false" name="form-mode" ok_button_action="saveProfile()"
        ok_button_label="Salvar" close_after_action="false" center_action_buttons="true" show_error_inline="true"
        can_submit="true">

        <form method="get" action="{{ route('produto_fornecedor.update', 1) }}" class="profile-form">
            @csrf
            <b class="mt-0">Atualizar Cadastro</b>

            <x-bladewind::input type="hidden" name="id" />
            <div class="grid grid-cols-2 gap-4 mt-6">
                <x-bladewind::input required="true" name="codigo" error_message="Please enter your first name"
                    label="codigo" />
                <x-bladewind::input required="true" name="descricao" error_message="Please enter your last name"
                    label="Descrição" />
                <x-bladewind::input name="site" error_message="Please enter your email" label="Site" />
                <x-bladewind::checkbox id="padrao" name="padrao" color="blue" label="Ativa no Site" />
            </div>
        </form>
    </x-bladewind::modal>
    <x-bladewind.modal name="apagar" type="error" title="Confirme Exclusão">
      
        Excluir  {{$titulo}}   <b class="title"></b>?
       

</x-bladewind.modal>

</div>

<script>
    formmodeInclui =()=>{
        showModal('form-mode');
    }

    formmode = (id, codigo, descricao, padrao ,dtatualizacao,site) => {

        showModal('form-mode');
        domEl('.id').value = id;
        domEl('.codigo').value = codigo;
        domEl('.descricao').value = descricao;
        domEl('.site').value = site;

        var ativo = "false"
        if (padrao == 1) {
            ativo = "true";
        }
        domEl('.padrao').value = ativo;



    }
    // the script called by the Update button
    saveProfile = () => {
        if (validateForm('.profile-form')) {

            domEl('.profile-form').submit();
        } else {
            return false;
        }
    }
    destroy  = (id,nome) => {
   showModal('apagar');
    domEl('.bw-apagar .title').innerText = `${nome}`;
}

    
</script>
