<?php

use Illuminate\Database\Seeder;
use App\Models\Core\People\People;
use App\Models\Core\AccessControl\Role;
use App\Models\Core\People\PeopleType;
use App\Models\Core\AccessControl\Occupation;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Core\Contact\ContType;

class BaseCoreTableSeeder extends Seeder
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

            // adicionando os endereços
            include 'Address.php';

            /* adicionando tipo de contato */
            $contatoTypeAll = ContType::create(['name' => 'Todos']);
            $contatoTypePessoal = ContType::create(['name' => 'Pessoal']);
            $contatoTypeCommercial = ContType::create(['name' => 'Comercail']);
            $contatoTypeResidential = ContType::create(['name' => 'Residencial']);
            $contatoTypeCobranca = ContType::create(['name' => 'Cobrança']);

            // adicionando os papeis(roles)
            $objRolesRoot = Role::create(['id'=>1,'name'=>'Root', 'slug'=>Str::slug('Root'), 'description'=>'Tem acesso a todo o SoftWare']);
            $objRolesAdministrador = Role::create(['id'=>2,'name'=>'Administrador', 'slug'=>Str::slug('administrator'), 'description'=>'Pessoa responavel por gerenciar o SoftWare para a Empresa']);
            $objRolesColaborador = Role::create(['id'=>3,'name'=>'Colaborador', 'slug'=>Str::slug('employee'), 'description'=>'Funcionário']);
            $objRolesCliente = Role::create(['id'=>4,'name'=>'Cliente', 'slug'=>Str::slug('client')]);
            $objRolesForncedor = Role::create(['id'=>5,'name'=>'Fornecedor', 'slug'=>Str::slug('caterer')]);
            $objRolesResponsavel = Role::create(['id'=>6,'name'=>'Responsavel', 'slug'=>Str::slug('responsible'),'description'=>'Responsavel (contato) de uma empresa']);
            $objRolesConjuge = Role::create(['id'=>7,'name'=>'Conjuge', 'slug'=>Str::slug('spouse')]);
            $objRolesDependete= Role::create(['id'=>8,'name'=>'Dependente', 'slug'=>Str::slug('dependent')]);

            // adicionando as Ocupações dos funcionários dentro da empresa
            $objOccupationDiretorAdministrativoFinanceiro = $objRolesColaborador->addOccupation(['cbo2002'=>'1231-10','name'=>'Diretor administrativo e financeiro','description'=>'Superintendente administrativo e financeiro']);
            $objOccupationGerenteVendas = $objRolesColaborador->addOccupation(['cbo2002'=>'1423-20','name'=>'Gerente de vendas','description'=>'Gerente de departamento de vendas, Gerente de exportação, Gerente de mercado, Gerente de área de vendas, Gerente distrital de vendas, Gerente geral de vendas, Gerente nacional de vendas, Gerente regional de vendas']);
            $objOccupationGerenteCompras = $objRolesColaborador->addOccupation(['cbo2002'=>'1424-05','name'=>'Administrador de compras, Coordenador de compras, Gerente de materiais, Gerente de planejamento de compras, Gerente geral de compras, Gerente nacional de compras']);
            $objOccupationProgramador = $objRolesColaborador->addOccupation(['cbo2002'=>'3171-10','name'=>'Programador de sistemas de informação']);
            $objOccupationGerenteRede = $objRolesColaborador->addOccupation(['cbo2002'=>'1425-05','name'=>'Gerente de rede','description'=>'Gerente de infra-estrutura de tecnologia da informação, Gerente de teleprocessamento']);
            $objOccupationGerenteDesenvolvimento = $objRolesColaborador->addOccupation(['cbo2002'=>'1425-10','name'=>'Gerente de desenvolvimento de sistemas','description'=>'Gerente de programação de sistema']);
            $objOccupationGerenteProjetos = $objRolesColaborador->addOccupation(['cbo2002'=>'1425-20','name'=>'Gerente de projetos de tecnologia da informação']);
            $objOccupationGerenteSuporte = $objRolesColaborador->addOccupation(['cbo2002'=>'1425-30','name'=>'Gerente de suporte técnico de tecnologia da informação']);
            $objOccupationRecepcionista = $objRolesColaborador->addOccupation(['cbo2002'=>'4221','name'=>'Recepcionistas']);
            $objOccupationInstalador = $objRolesColaborador->addOccupation(['cbo2002'=>'7313-05','name'=>'Instalador de equipamentos de comunicação']);
            $objOccupationAuxiliarInstalador = $objRolesColaborador->addOccupation(['cbo2002'=>'3741-10','name'=>'Auxiliar de instalação (equipamentos de rádio)']);

            // adiciona do o tipo de pessoa
            $objPeopleTypeFisica = PeopleType::create(['id'=>1,'name'=>'Fisíca']);
            $objPeopleTypeJuridica = PeopleType::create(['id'=>2,'name'=>'Jurídica']);

            // adicionando um usuario Root responsavel por gerenciar o SoftWare
            $objPerson_1 = $objPeopleTypeFisica->addPeople([]);
            $objPerson_1->addRole($objRolesRoot);
            $objPhysical_1 = $objPerson_1->addPhysical(['name'=>'Paulo Roberto da Silva','document'=>'95258418049']);
            $objPhysical_1->addUser(['username'=>'paulo','password'=>'12345678']);

            // adicionando a empresa contratante do SoftWare
            $objPerson_2 = $objPeopleTypeJuridica->addPeople([]);
            $objCompany_1 = $objPerson_2->addCompany(['business_name'=>'GBit Telecom', 'fantasy_name'=>'GBit', 'document'=>'24294146000155', 'software_owner'=>true]);

            // adicionando a pessoa fisica Administrador do software para a empresa
            $objPerson_3 = $objPeopleTypeFisica->addPeople([]);
//            $objPerson_3->addRole($objRolesAdministrador);
            $objRolesColaborador_1 = $objPerson_3->addRole($objRolesColaborador);
            $objPhysical_2 = $objPerson_3->addPhysical(['name'=>'Willian Woiciechoski','document'=>'03824286092']);
            $objPhysical_2->addOccupation($objOccupationGerenteRede);
            $objPhysical_2->addUser(['username'=>'willian','password'=>'12345678']);

            // adicionando a pessoa fisica Colaborador da empresa
            $objPerson_4 = $objPeopleTypeFisica->addPeople([]);
            $objRolesColaborador_2 = $objPerson_4->addRole($objRolesColaborador);
            $objPhysical_3 = $objPerson_4->addPhysical(['name'=>'Robert','document'=>'78258417582']);
            $objPhysical_3->addOccupation($objOccupationInstalador);
            $objPhysical_3->addUser(['username'=>'robert','password'=>'12345678']);

            // adicionando a pessoa fisica Colaborador da empresa
            $objPerson_5 = $objPeopleTypeFisica->addPeople([]);
            $objRolesColaborador_3 = $objPerson_5->addRole($objRolesColaborador);
            $objPhysical_4 = $objPerson_5->addPhysical(['name'=>'Luciano da Silva','document'=>'18258417582']);
            $objPhysical_4->addOccupation($objOccupationInstalador);
            $objPhysical_4->addUser(['username'=>'luciano','password'=>'12345678']);

            // adicionando a pessoa fisica Colaborador da empresa
            $objPerson_6 = $objPeopleTypeFisica->addPeople([]);
            $objRolesColaborador_4 = $objPerson_6->addRole($objRolesColaborador);
            $objPhysical_5 = $objPerson_6->addPhysical(['name'=>'Luciane Berner','document'=>'5425417582']);
            $objPhysical_5->addOccupation($objOccupationGerenteVendas);
            $objPhysical_5->addUser(['username'=>'luciane','password'=>'12345678']);

            // adicionando a pessoa fisica Colaborador da empresa
            $objPerson_7 = $objPeopleTypeFisica->addPeople([]);
            $objRolesColaborador_5 = $objPerson_7->addRole($objRolesColaborador);
            $objPhysical_6 = $objPerson_7->addPhysical(['name'=>'Juliana','document'=>'5725417582']);
            $objPhysical_6->addOccupation($objOccupationRecepcionista);
            $objPhysical_6->addUser(['username'=>'juliana','password'=>'12345678']);

            // adicionando a pessoa fisica Colaborador da empresa
            $objPerson_8 = $objPeopleTypeFisica->addPeople([]);
            $objRolesColaborador_6 = $objPerson_8->addRole($objRolesColaborador);
            $objRolesCliente_1 = $objPerson_8->addRole($objRolesCliente);
            $objPhysical_7 = $objPerson_8->addPhysical(['name'=>'Andriele','document'=>'8425417582']);
            $objPhysical_7->addOccupation($objOccupationRecepcionista);
            $objPhysical_7->addUser(['username'=>'andriele','password'=>'12345678']);

            // adicionando a pessoa fisica Colaborador da empresa
            $objPerson_9 = $objPeopleTypeFisica->addPeople([]);
            $objRolesColaborador_7 = $objPerson_9->addRole($objRolesColaborador);
            $objPhysical_8 = $objPerson_9->addPhysical(['name'=>'Tiago','document'=>'8495417582']);
            $objPhysical_8->addOccupation($objOccupationInstalador);
            $objPhysical_8->addUser(['username'=>'tiago','password'=>'12345678']);

            //Cliente
            $objPerson_10 = $objPeopleTypeJuridica->addPeople([]);
            $objRolesCliente_2 = $objPerson_10->addRole($objRolesCliente);
            $objCompany_2 = $objPerson_10->addCompany(['business_name'=>'Floripa Server LTDA ME', 'fantasy_name'=>'Floripa Server', 'document'=>'10916734000155']);

            //Fornecedores
            $objPerson_11 = $objPeopleTypeJuridica->addPeople([]);
            $objRolesFornecedor_1 = $objPerson_11->addRole($objRolesForncedor);
            $objCompany_3 = $objPerson_11->addCompany(['business_name'=>'WR', 'fantasy_name'=>'WR', 'document'=>'10919734000185']);

            $objPerson_12 = $objPeopleTypeJuridica->addPeople([]);
            $objRolesFornecedor_2 = $objPerson_12->addRole($objRolesForncedor);
            $objCompany_4 = $objPerson_12->addCompany(['business_name'=>'CommCorp', 'fantasy_name'=>'CommCorp', 'document'=>'11919734000185']);


            echo $objRolesColaborador_1->people->find($objPerson_4);

            //dd($objRolesColaborador_1->persons->find($objPerson_4->id)->pivot->id);
            //$objRolesColaborador_1->addOccupation([]);

            return DB::commit(); //validar as transações
        }catch(ValidationException $e){
//        }catch(\Exception $e){
           DB::rollback(); //reverter tudo, caso tenha acontecido algum erro.
        }

//        $teste = Person::find(4);
//        foreach ($teste->roles as $role) {
//            dd($role->pivot->id);
//        }

//        $objCompany_1 = Company::create(['fantasy_name'=>'SoftEmp']);
//            $objUser_1 = User::create(['name'=>'Paulo Roberto da Silva']);
//            $objUser_1->addAuthentication(['user_name'=>'paulo','password'=>'12345678','status'=>'1']);
//        $objCompany_1->users()->attach($objUser_1);
//
//        $objCompanyUser_1 = CompanyUser::getCompanyUser($objCompany_1,$objUser_1);
//            $objRole_1 =  Role::whereName('Root')->firstOrFail();
//        $objCompanyUser_1->roles()->attach($objRole_1);//criando o relacionamento com a role//
//
//        //comapny Norte Server
//        $objCompany_1 = Company::create(['fantasy_name'=>'Norte Server']);
//        $objUser_1 = User::create(['name'=>'Willian W']);
//        $objUser_1->addAuthentication(['user_name'=>'willian','password'=>'12345678','status'=>'1']);
//        $objCompany_1->users()->attach($objUser_1);
//
//        $objCompanyUser_1 = CompanyUser::getCompanyUser($objCompany_1,$objUser_1);
//            $objRole_1 =  Role::whereName('Colaborador')->firstOrFail();
//        $objCompanyUser_1->roles()->attach($objRole_1);//criando o relacionamento com a role
//
//        $objCompanyUserRole_1 = CompanyUserRole::getCompanyUserRole($objCompanyUser_1,$objRole_1);
//            $objOccupation_1 =  $objRole_1->occupation()->whereName('Gerente de Rede')->firstOrFail();
//        $objCompanyUserRole_1->occupations()->attach($objOccupation_1->id);

//        dd($objOccupation_1);

//
//
//        $physical_2 = User::create(['name'=>'Willian W']);
//        $physical_2->addUser(['user_name'=>'willian','password'=>'12345678']);
//        $physical_2->addCompany(Company::create(['fantasy_name'=>'Norte Server']));
//        $physical_2->addCompany(Company::create(['fantasy_name'=>'Swap Money']));
//
//        $physical_3 = User::create(['name'=>'Wilson Pereira']);
//        $physical_3->addUser(['user_name'=>'wilson','password'=>'12345678']);
//        $physical_3->addCompany(Company::create(['fantasy_name'=>'W2otech']));
//
//        $physical_4 = User::create(['name'=>'Lucas Pacheco']);
//        $physical_4->addUser(['user_name'=>'lucas','password'=>'12345678']);
//        $physical_4->addCompany(Company::create(['fantasy_name'=>'Cachimbo']));
    }
}
