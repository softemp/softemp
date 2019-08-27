<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCountriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('countries', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 190)->unique();
            $table->string('iso2', 2)->unique();/*abreviação com 2 digitos*/
            $table->string('iso3', 3)->unique();/*abreviação com 3 digitos*/
            $table->string('ddi', 15);/*codigo internacional do País*/

            $table->timestamps();
        });

        /*relacionamento de muitos para muitos com a tabela de Continentes*/
        Schema::create('continent_countrie', function (Blueprint $table) {
            $table->unsignedBigInteger('continent_id');
            $table->foreign('continent_id')->references('id')->on('continents')->onDelete('restrict');

            $table->unsignedBigInteger('countrie_id');
            $table->foreign('countrie_id')->references('id')->on('countries')->onDelete('restrict');

            //$table->primary(['continent_id', 'countrie_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('continent_countrie');
        Schema::dropIfExists('countries');
    }
}
