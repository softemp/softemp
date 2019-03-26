<?php

use Illuminate\Database\Seeder;
use App\Models\Base\AccessControl\Module;
use App\Models\Base\AccessControl\Role;
use App\Models\Base\AccessControl\Permission;

class AccessControlTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // modulos
        // Modulo Base
        $softemp_base = 'softemp_base';
//        $moduleAccessControl = Module::create(['name'=>'Access Control','database'=>$softemp_base]);
//        $moduleCompany = Module::create(['name'=>'Company','database'=>$softemp_base]);
//        $moduleUser = Module::create(['name'=>'User','database'=>$softemp_base]);
//        $moduleAuth = Module::create(['name'=>'Auth','database'=>$softemp_base]);

        #modulos
        $modulePermission = Module::create(['name'=>'Permissões', 'database'=>$softemp_base]);
        $moduleRole = Module::create(['name'=>'Papéis', 'database'=>$softemp_base]);
        $moduleEmployee = Module::create(['name'=>'Colaborador', 'database'=>$softemp_base]);
        $moduleClient = Module::create(['name'=>'Cliente', 'database'=>$softemp_base]);
        $moduleCaterer = Module::create(['name'=>'Fornecedor', 'database'=>$softemp_base]);
        $moduleContact = Module::create(['name'=>'Contato', 'database'=>$softemp_base]);
        $moduleConfig = Module::create(['name'=>'Configuração', 'database'=>$softemp_base]);


        // adicionando os papeis basico do software Roles
        $roleRoot = Role::create(['id' => 1, 'slug' => 'root', 'name' => 'Root', 'description' => 'Super Usuário']);/*não altere esta role pois ela tem permissão geral e é somente utilizada pelo desenvolvedor*/
        $roleOwner = Role::create(['id' => 2, 'slug' => 'owner', 'name' => 'Proprietário']);/*Proprietário de uma empresa*/
        $roleBusinessPartner = Role::create(['id' => 3, 'slug' => 'business-partner', 'name' => 'Socio']);/*Sócio de uma empresa ou negócio*/
        $roleEmployee = Role::create(['id' => 4, 'slug' => 'employee', 'name' => 'Colaborador']);/*Colaborador o mesmo que funcionário da empresa*/
        $roleClient = Role::create(['id' => 5, 'slug' => 'client', 'name' => 'Cliente']);/*Cliente da empresa*/
        $roleCaterer = Role::create(['id' => 6, 'slug' => 'caterer', 'name' => 'Fornecedor']);/*Fornecedor da empresa*/
        $roleSpouse = Role::create(['id' => 7, 'slug' => 'spouse', 'name' => 'Conjuge']);/*Conjuje de um colaborador*/
        $roleDependent = Role::create(['id' => 8, 'slug' => 'dependent', 'name' => 'Dependente']);/*Dependente de um colaborador*/
        $roleResponsible = Role::create(['id' => 9, 'slug' => 'responsible', 'name' => 'Responsavel', 'description' => 'Responsável por uma Empresa']);/*Contato de uma empresa*/
        $roleParentCompany = Role::create(['id' => 10, 'slug' => 'parent-company', 'name' => 'Empresa Matriz', 'description' => '']);
        $roleSubsidiary = Role::create(['id' => 11, 'slug' => 'subsidiary', 'name' => 'Empresa Filial', 'description' => '']);

        /* Adicionando a ocupações(profissões)*/
        $occupationAdministrator = $roleEmployee->addOccupation(['name' => 'Administrador']);
        $occupationGeneralManager = $roleEmployee->addOccupation(['name' => 'Gerente Geral']);
        $occupationCommercialManager = $roleEmployee->addOccupation(['name' => 'Gerente Comercial']);
        $occupationFinancialManager = $roleEmployee->addOccupation(['name' => 'Gerente Financeiro']);
        $occupationSalesManager = $roleEmployee->addOccupation(['name' => 'Gerente de Vendas']);
        $occupationNetworkManager = $roleEmployee->addOccupation(['name' => 'Gerente de Rede']);
        $occupationReceptionist = $roleEmployee->addOccupation(['name' => 'Recepcionista']);
        $occupationInstaller = $roleEmployee->addOccupation(['name' => 'Instalador']);
        $occupationAssistantInstaller = $roleEmployee->addOccupation(['name' => 'Auxiliar de instalação']);

        #adicionando as permissions para o Modulo de Fornecedores
        $catererView = Permission::create(['module_id'=>$moduleCaterer->id, 'slug' => 'caterer-view', 'name' => 'Ver Fornecedores', 'description' => 'Acessar Modulo de Fornecedores']);
        $catererCreate = Permission::create(['module_id'=>$moduleCaterer->id, 'slug' => 'caterer-create', 'name' => 'Cadastrar Fornecedores']);
        $catererUpdate = Permission::create(['module_id'=>$moduleCaterer->id, 'slug' => 'caterer-update', 'name' => 'Alterar Fornecedores']);
        $catererDestroy = Permission::create(['module_id'=>$moduleCaterer->id, 'slug' => 'caterer-destroy', 'name' => 'Deletar Fornecedores']);

        #adicionando as permissions para o Modulo de Clientes
        $clientView = Permission::create(['module_id'=>$moduleClient->id, 'slug' => 'client-view', 'name' => 'Ver Clientes', 'description' => 'Acessar Modulo de Clientes']);
        $clientCreate = Permission::create(['module_id'=>$moduleClient->id, 'slug' => 'client-create', 'name' => 'Cadastrar Clientes']);
        $clientUpdate = Permission::create(['module_id'=>$moduleClient->id, 'slug' => 'client-update', 'name' => 'Alterar Cliente']);
        $clientDestroy = Permission::create(['module_id'=>$moduleClient->id, 'slug' => 'client-destroy', 'name' => 'Deletar Cliente']);

        #adicionando as permissions para o Modulo de Colaboradores
        $employeeView = Permission::create(['module_id'=>$moduleEmployee->id, 'slug' => 'employee-view', 'name' => 'Ver Colaboradores', 'description' => 'Acessar Modulo de Colaboradores']);
        $employeeCreate = Permission::create(['module_id'=>$moduleEmployee->id, 'slug' => 'employee-create', 'name' => 'Cadastrar Colaborador']);
        $employeeUpdate = Permission::create(['module_id'=>$moduleEmployee->id, 'slug' => 'employee-update', 'name' => 'Alterar Colaborador']);
        $employeeDestroy = Permission::create(['module_id'=>$moduleEmployee->id, 'slug' => 'employee-destroy', 'name' => 'Deletar Colaborador']);

        #adicionando as permissions para o Modulo de Ocupações dos Colaboradores
        $occupationView = Permission::create(['module_id'=>$moduleEmployee->id, 'slug' => 'occupation-view', 'name' => 'Ver Ocupações', 'description' => 'Acessar Modulo de Ocupações dos Colaboradores']);
        $occupationCreate = Permission::create(['module_id'=>$moduleEmployee->id, 'slug' => 'occupation-create', 'name' => 'Cadastrar Ocupação']);
        $occupationUpdate = Permission::create(['module_id'=>$moduleEmployee->id, 'slug' => 'occupation-update', 'name' => 'Alterar Ocupação']);
        $occupationDestroy = Permission::create(['module_id'=>$moduleEmployee->id, 'slug' => 'occupation-destroy', 'name' => 'Deletar Ocupação']);
    }
}
