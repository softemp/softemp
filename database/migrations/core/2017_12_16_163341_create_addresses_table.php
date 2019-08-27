<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('number',11)->default(0)->comment('numero na rua');
            $table->string('apartment',10)->nullable()->comment('apartamento ou sala');
            $table->string('building',50)->nullable()->comment('nome do edificio');
            $table->text('complement')->nullable()->comment('complemento ou ponto de referencia');
            $table->enum('principal',['0','1'])->default(0)->comment('0=secundario, 1=principal');
            $table->enum('status',['0','1'])->default(1)->comment('0=desativado, 1=ativo');

            /*ligação do endereço com o tipo de endereço*/
            $table->unsignedBigInteger('address_type_id');
            $table->foreign('address_type_id')->references('id')->on('address_types')->onDelete('restrict');

            /*ligação do endereço com o logradouro*/
            $table->unsignedBigInteger('street_id');
            $table->foreign('street_id')->references('id')->on('streets')->onDelete('restrict');

            /*adicionando a ligação do endereço com as pessoas*/
            $table->unsignedBigInteger('person_id');
            $table->foreign('person_id')->references('id')->on('people')->onDelete('restrict');

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
        Schema::dropIfExists('addresses');
    }
}
