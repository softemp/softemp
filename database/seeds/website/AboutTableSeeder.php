<?php

use Illuminate\Database\Seeder;
use App\Models\WebSite\About;
use App\Models\Core\Company\Company;
use Illuminate\Support\Facades\DB;

class AboutTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        try{
            DB::beginTransaction(); //marcador para iniciar transações

            $company = Company::whereDocument('24294146000155')->firstOrFail();
//            dd($company);

            $about = About::create(['title'=>'Sobre Nos', 'description'=>'Nossa HIstória<br><br>

<p>Gbit Telecom veio para inovar a internet na região de Garopaba e Imbituba ela já está nessa região a mais 10 anos mais vindo de gerações de empresas conhecidas da Região e vamos nos apresentar a vocês como chegamos aqui.</p>

<p>Começou de uma Parceria entre a Floripa server que atende todo norte da Ilha de Florianópolis sendo uma das pioneira em Florianópolis  os empresários conhecido na região de Garopaba e imbituba ,  Marcio da Internet  e Janderson Sena  que fizeram parceria com a floripa server para fornecer internet na Região Garopaba e Imbituba.</p> 

<p>Nesse meio tempo um dos sócios da Floripa Server Paulo Silva que sempre viu como uma região promissora e carente de um serviço de qualidade, se desligando da Empresa Floripa Server de Florianópolis e adquiriu a região de garopaba e imbituba passando a ser Norte Server, com um espaço melhor para o atendimento renovação…</p>

<p>Aí passou a se pergunta Norte server o nome servia quando era na ilha de florianópolis, mais não combinava com garopaba e imbituba então depois de muita pesquisa surgiu o nome Gbit Telecom.</p>

<p>Como chegamos a esse nome, foi pensando em que a Letra G simboliza Giga por nossa estrutura ser GigaByte  o Bit é a sigla para Binario Digital e por fim Telecom, abreviação de telecomunicação.</p>

<p>Slogan: Gbit Telecom Internet Fibra Óptica</p> 

<p>A Partir do dia 1 Janeiro de 2018 vai passar a ser conhecida Gbit Telecom.</p>', 'owner_company_id'=>$company->id]);
//dd($about);
            return DB::commit(); //validar as transações
        }catch(ValidationException $e){
//        }catch(\Exception $e){
           DB::rollback(); //reverter tudo, caso tenha acontecido algum erro.
        }
    }
}
