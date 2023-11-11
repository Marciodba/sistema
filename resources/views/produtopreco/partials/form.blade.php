<link href="{{ asset('vendor/bladewind/css/animate.min.css') }}" rel="stylesheet" />
<link href="{{ asset('vendor/bladewind/css/bladewind-ui.min.css') }}" rel="stylesheet" />
<script src="{{ asset('vendor/bladewind/js/helpers.js') }}"></script>
<script src="//unpkg.com/alpinejs" defer></script>
<meta name="viewport" content="width=device-width, initial-scale=1">
@csrf

<x-bladewind.notification />

<x-bladewind.card>

    <form method="get" class="signup-form">

        <h1 class="my-2 text-2xl font-light text-blue-900/80">Editar Produto</h1>
        <p class="mt-3 mb-6 text-blue-900/80 text-sm">
            Editando Cadastro de Produtos
        </p>
        <div class="flex gap-4">
            <x-bladewind.input name="codigo" required="true" label="Codigo"
                value="{{ $produtopreco[0]->codigo ?? old('codigo') }}" error_message="codigo Obritatoria" />

            <x-bladewind.input name="nome" required="false" label="Descrição"
                value="{{ $produtopreco[0]->nome ?? old('nome') }}" error_message="Descriçao Obritatoria" />

            <x-bladewind.input name="codigobarra" required="false" label="codigobarra"
                value="{{ $produtopreco[0]->codigobarra ?? old('codigobarra') }}"
                error_message="Descriçao Obritatoria" />
        </div>
     


            <x-bladewind.select name="classificacao" 
            placeholder="Classificação"
            selected_value="PRODUTO"
            searchable="true" label_key="codigo" value_key="code"
                flag_key="code" :data="$grupos" />
                <div class="flex gap-4">
            <x-bladewind.input name="observacao" required="false" label="observacao"
                value="{{ $produtopreco[0]->observacao ?? old('observacao') }}" error_message="Descriçao Obritatoria" />

            <x-bladewind.input name="preco" required="false" label="preco" placeholder="0.00" prefix="R$"
                numeric="true" value="{{ $produtopreco[0]->preco ?? old('preco') }}"
                error_message="Descriçao Obritatoria" />


        </div>
        <div class="text-center">

            <x-bladewind.button name="btn-save" has_spinner="true" type="primary" can_submit="true" class="mt-3">
                Salvar
            </x-bladewind.button>

        </div>

    </form>

</x-bladewind.card>
