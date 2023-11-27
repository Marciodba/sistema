<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class CepCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:cep {CEP}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'buscar endereço pelo cep';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        //
      $cep=  $this->argument('CEP');
      $return=  Http::withHeaders([
            'Authorization' => 'Token token=5417fff729bee0b37a066f1730005369'
        ])->get('https://www.cepaberto.com/api/v3/cep?cep='.$cep);
        $json =$return->json();
       return $json;
    }
}
