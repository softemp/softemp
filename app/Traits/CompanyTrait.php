<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

trait CompanyTrait
{

    protected static function bootCompanyTrait()
    {
        if (auth()->check()) {
            dd('teste de auth');
            static::creating(function ($model) {
                // $model->created_by_user_id = auth()->id();
                // $model->owner_company_id = 10;
                $model->owner_company_id = auth()->user()->active_company_id;
            });

            static::addGlobalScope('owner_company_id', function (Builder $builder) {
                $builder->where('owner_company_id', auth()->user()->active_company_id);
            });
        }

        $se = Session::getId();

        //$id = ;
        //dd($se);
//        static::addGlobalScope('owner_company_id', function (Builder $builder) {
//            $builder->where('owner_company_id', 7);
//        });
        //dd('teste');
//        $re = Auth::check();
//        dd($re);
    }

}
