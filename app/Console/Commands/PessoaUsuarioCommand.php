<?php

namespace App\Console\Commands;

use App\Http\Controllers\PessoaController;
use Illuminate\Console\Command;

class PessoaUsuarioCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:pessoa-usuario-command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description criar usuario de garagem para bairo pessoa to user';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $pessoaController=  new  PessoaController;
        $pessoaController->cadastrarUsuario();
    }
}
