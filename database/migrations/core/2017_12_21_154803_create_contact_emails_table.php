<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactEmailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cont_emails', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('email')->unique();
            $table->enum('is_login',['0','1'])->default(0);//define se o email é usado para login

            /*ligação com a tabela tipo de contato*/
            $table->unsignedBigInteger('cont_type_id');
            $table->foreign('cont_type_id')->references('id')->on('cont_types')->onDelete('restrict');

            /*ligação com a tabela de pessoas*/
            $table->unsignedBigInteger('person_id');
            $table->foreign('person_id')->references('id')->on('people')->onDelete('restrict');

            $table->timestamps();
            $table->softDeletes();

            #impedir o cadastro de indices iguais ou impedir que email tenha a mesma person_id duas vezez
            //$table->unique(array('email','person_id'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cont_emails');
    }
}
