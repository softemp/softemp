<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStreetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('streets', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('zip_code',10);/*cep sem o traço*/

            /*ligação do logradouro com o bairro*/
            $table->unsignedBigInteger('neighboarhood_id')->unsigned()->index()->nullable();
            $table->foreign('neighboarhood_id')->references('id')->on('neighboarhoods')->onDelete('restrict');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('streets');
    }
}
