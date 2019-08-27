<?php

namespace App\Http\Controllers\SoftEmp\Panel\Core\Contact;

//use App\Http\Validators\Contact\ContTypeValidator;
use App\Http\Controllers\SoftEmp\Panel\CrudController;
use App\Models\Core\Contact\ContType;
use Illuminate\Http\Request;

class ContactTypeController extends CrudController
{
    protected $pathView = 'softemp.panel.core.contact.type';
    protected $groupRoute = 'panel.contact.type';

    public function __construct(ContType $model, Request $request)
    {
        $this->request = $request;

        parent::__construct($model, $this->groupRoute, $this->pathView);
    }
}
