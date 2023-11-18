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

<x-bladewind.button  onclick="alert('Inclui')" size="tiny">Novo</x-bladewind.button>

<x-bladewind.button   size="tiny">Filtro</x-bladewind.button>
<x-bladewind.button size="tiny">Enviar</x-bladewind.button>
<x-bladewind.button  size="tiny">Imprimir</x-bladewind.button>
<x-bladewind.button  size="tiny">Voltar</x-bladewind.button>


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
<div>
    <x-bladewind::modal
        size="xl"
        backdrop_can_close="false"
        name="form-mode"
        ok_button_action="saveProfile()"
        ok_button_label="Salvar"
        close_after_action="false"
        center_action_buttons="true"
        show_error_inline="true"
        can_submit="true">

    <form method="get" action="{{route('vpessoageral.update',1)}}" class="profile-form">
        @csrf
        <b class="mt-0">Atualizar Cadastro</b>

        <x-bladewind::input type="hidden" name="pessoaid"/>
        <div class="grid grid-cols-2 gap-4 mt-6">
            
            <x-bladewind::input required="true" name="pessoaapelido"
                error_message="Please enter your first name" label="Apelido" />

            <x-bladewind::input required="true" name="pessoanome"
                error_message="Please enter your last name" label="Nome" />

        <x-bladewind::input required="true" name="pessoacgc"
            error_message="Please enter your email" label="Cpf" />

        <x-bladewind::input  name="pessoagruposbbcodigo" label="Grupo"/>
        <x-bladewind::input name="pessoaobservacao" label="Observação"/>
        <x-bladewind::input  name="pessoaramocodigo" label="Cargo"/>
        <x-bladewind::input name="pessoaobservacao1" label="Motivo"/>
        <x-bladewind::datepicker name="pessoadtlixo" format="dd/mm/yyyy"  placeholder="Aniversário"/>

    <x-bladewind::checkbox   id="pessoaativo" name="pessoaativo" color="blue"  label="Ativo"/>

</div>
</form>

</x-bladewind::modal>

<script>


formmode = (pessoaid,pessoaobservacao,pessoaobservacao1,pessoagruposbbcodigo,pessoaramocodigo,pdapelido,pessoaapelido,pessoaativo,pessoacgc,pessoadtatualizacao,pessoadtcad,pessoadtlixo,pessoanome) => {


showModal('form-mode');
domEl('.pessoaapelido').value = pessoaapelido;
domEl('.pessoanome').value = pessoanome;
domEl('.pessoaobservacao').value = pessoaobservacao;
domEl('.pessoaobservacao1').value = pessoaobservacao1;
domEl('.pessoaramocodigo').value = pessoaramocodigo;
domEl('.pessoaid').value = pessoaid;
domEl('.pessoacgc').value = pessoacgc;
domEl('.pessoagruposbbcodigo').value = pessoagruposbbcodigo;
domEl('.country').data ='pessoaapelido';
domEl('.pessoadtlixo').value = pessoadtlixo;
var ativo="false"
if(pessoaativo == 1){
    ativo="true";
}
domEl('.pessoaativo').value = ativo;


   
}
// the script called by the Update button
saveProfile = () => {

    if(validateForm('.profile-form')){
       
        domEl('.profile-form').submit();
    } else {
        return false;
    }
}
deleteUser = (id, nome, uf) => {
    showModal('delete-user');
    domEl('.bw-delete-user .title').innerText = `${pessoanome} ${pessoaapelido}`;
}

redirect = (url) => {
    window.open(url);
}


    </script>

    


