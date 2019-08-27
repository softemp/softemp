<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactPhonesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cont_phones', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('ddd',2);
            $table->string('phone',11);

            /*ligação com a tabela tipo de contato*/
            $table->unsignedBigInteger('cont_type_id');
            $table->foreign('cont_type_id')->references('id')->on('cont_types')->onDelete('restrict');

            /*ligação com a tabela de pessoas*/
            $table->unsignedBigInteger('person_id');
            $table->foreign('person_id')->references('id')->on('people')->onDelete('restrict');

            $table->timestamps();
            $table->softDeletes();

            #impedir o cadastro de indices iguais ou impedir que phone tenha a mesma person_id duas vezez
            //$table->unique(array('phone','person_id'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cont_phones');
    }
}
