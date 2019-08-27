<?php

namespace App\Http\Controllers\SoftEmp\Panel\Contacts;

use App\Http\Controllers\SoftEmp\CrudController;
use App\Http\Validators\Contacts\ContEmailValidator;
use App\Models\Contacts\ContEmail;
use App\Models\Contacts\ContType;
use Illuminate\Http\Request;

class ContactEmailsController
{
    private $model;
    private $validator;
    private $contactType;
    private $route;

    /**
     * ContactEmailsController constructor.
     */
    public function __construct()
    {
        $this->model = new ContEmail;
        $this->validator = new ContEmailValidator;
        $this->contactType = new ContType;
    }

    /**
     * @param object $personPhysical
     * @param $email_login
     * @param $route
     * @return ContactEmailsController|mixed
     */
    public function createIsLoginEmail(object $personPhysical, $email_login, $route)
    {
        //criar um novo email pela autenticação
        if (!$email_login['email_id'] && $email_login['email']) {
            $this->route = $route;
            $result = $this->emailIsLoginCreate($personPhysical, $email_login);
        }
        //redefinir email para login
        if ($email_login['email_id']) {
            $result = $this->emailIsLogin($personPhysical, $email_login);
        }
        return $result;
    }

    /**
     * method para criar o email para login
     *
     * @param object $personPhysical
     * @param $email_login
     * @return $this
     */
    private function emailIsLoginCreate(object $personPhysical, $email_login)
    {
        //$validato = new ContEmailValidator();
        $validator = validator($email_login, $this->validator->rulesUpdate($personPhysical->persons->id));
        if ($validator->fails()) {
            return redirect()->route("{$this->route}.edit", ['id' => $personPhysical->id])
                ->withErrors($validator)
                ->withInput();
        }
        //procura por email utilizado para login
        $isLogins = $this->model->where([
            ['is_login', '=', '1'],
            ['person_id', '=', $personPhysical->persons->id]
        ])->get();
        //se encontrar remove o campo is_login para 0
        if ($isLogins) {
            foreach ($isLogins as $isLogin) {
                $isLogin->update(['is_login' => '0']);
            }
        }
        //cria o email e o define para login
        $createEmail = $this->model->create([
            'email' => $email_login['email'],
            'is_login' => '1',
            'cont_type_id' => '1',
            'person_id' => $personPhysical->persons->id
        ]);
        return $createEmail;
    }

    /**
     * procura no banco por email que é utilizado para login e altera para o email recebido em $email_login
     *
     * @param object $personPhysical
     * @param $email_login
     * @return mixed
     */
    private function emailIsLogin(object $personPhysical, $email_login)
    {
        //procura por email utilizado para login
        $isLogins = $this->model->where([
            ['is_login', '=', '1'],
            ['person_id', '=', $personPhysical->persons->id]
        ])->get();
        //se encontrar remove o campo is_login para 0
        if ($isLogins) {
            foreach ($isLogins as $isLogin) {
                $isLogin->update(['is_login' => '0']);
            }
        }
        //procura o email pelo id recebido e altera o campo is_login para 1
        $updateEmail = $this->model->find($email_login['email_id']);
            $updateEmail->update(['is_login' => '1']);
        return $updateEmail;
    }
}
