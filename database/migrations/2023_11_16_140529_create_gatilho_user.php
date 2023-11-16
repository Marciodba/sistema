<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
       ///criar triguer por migrate DB::unprepared(" ' CREATE OR REPLACE FUNCTION rede.fc_cadpessoa_user(_pessoadestino character varying, _nome character varying, _pessoaorigem character varying) RETURNS integer LANGUAGE plpgsql AS \$function\$ DECLARE result INTEGER := 0;     r_porigem RECORD;    r_pdestino RECORD;    BEGIN INSERT INTO public.pessoa (apelido,nome,dtcad ,dtatualizacao,idpessoagruposbb,senha,idpessoadependente,ativo,tipo,idramo) VALUES (_pessoadestino,_nome,now(),now(),1,'123',1,true,'F',1)ON CONFLICT (apelido) DO UPDATE SET dtatualizacao = now(),nome =_nome; update public.users set idpessoa = pessoa.id from public.pessoa where pessoa.apelido =_pessoaorigem;    select   id into r_porigem from pessoa where upper(apelido) = upper(_pessoaorigem);       select id into r_pdestino from pessoa where upper(apelido) = upper(_pessoadestino)\;  if r_porigem.id > 0 and r_pdestino.id >0 then    result = 1;    RAISE NOTICE '% .: ---------------- origem .: ', r_porigem.id;    RAISE NOTICE '% .: ---------------- destino .: ', r_pdestino.id ;    INSERT INTO pessoausuarioconfig(             idpessoa, ativo, trocarsenha, dt, dtultimoacesso, idpessoaempresa,  dtatualizacao)                select r_pdestino.id, ativo, trocarsenha, dt, dtultimoacesso, idpessoaempresa, now() from pessoausuarioconfig where idpessoa =r_porigem.id    and r_pdestino.id  not in (select idpessoa from pessoausuarioconfig where pessoausuarioconfig.idpessoa = r_pdestino.id);INSERT INTO public.menupermissao(           idpessoa, idmenusbb, dtinicio,  inclui ,  edita,  deleta,dtultima            ,ajuda,  dtatualizacao, qtdutilizacao, dtagenda,             tipoagenda, filtropadrao,dtfim)    select r_pdestino.id,idmenusbb, now(),  inclui ,  edita,  deleta,now(),ajuda, now(), 0, dtagenda,             tipoagenda, filtropadrao,dtfim from menupermissao where idpessoa =r_porigem.id    and idmenusbb not in (select idmenusbb from menupermissao where menupermissao.idpessoa = r_pdestino.id);      INSERT INTO menusbbcriteria(        idpessoa, idmenusbb, campo,  condicao ,  valor,  tipo,criteria,descricao,codigo,dtatualizacao )    select r_pdestino.id,idmenusbb, campo,  condicao ,  valor,  tipo,criteria,descricao,codigo,now() from menusbbcriteria where idpessoa =r_porigem.id    and idmenusbb not in (select idmenusbb from menusbbcriteria where idpessoa = r_pdestino.id);  INSERT INTO menusbbconfig(  idpessoa,  controle, clausulawhere, idmenusbb, descricao,   idpessoagruposbb, dtatualizacao)     select r_pdestino.id,controle, clausulawhere, idmenusbb, descricao,  idpessoagruposbb ,now() from menusbbconfig where idpessoa =r_porigem.id    and idmenusbb not in (select idmenusbb from menusbbconfig where idpessoa = r_pdestino.id)and controle not in (select controle from menusbbconfig where idpessoa = r_pdestino.id); else RAISE NOTICE '% .: ---------------- usuarios nao esta cadastrado .: -------------------, _pessoaorigem ||  ou  || _pessoadestino;endif;return1;END; \$function\$ ';");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
      /*  DB::unprepared('
        DROP TRIGGER `tr_user`;
        DROP FUNCTION rede.fc_cadpessoa_user;
        ');*/
    }
};
