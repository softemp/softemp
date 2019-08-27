<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('avatar');

            /*ligação com a tabela de Pessoa fisíca*/
            $table->unsignedBigInteger('physical_id');
            $table->foreign('physical_id')->references('id')->on('physicals')->onDelete('restrict');

            /*ligação com a tabela que atrela o pais ao idioma*/
            //$table->integer('countrie_language_id')->unsigned();
            //$table->foreign('countrie_language_id')->references('id')->on('countrie_languages')->onDelete('restrict');

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
        Schema::dropIfExists('profiles');
    }
}
