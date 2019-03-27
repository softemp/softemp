<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEquipmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql_stockcontrol')->create('equipment', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('equipment_model_id');
            $table->string('mac');
            $table->string('ns');
            $table->date('purchase_date');
            $table->bigInteger('status')->default(1);

            $table->timestamps();

            $table->foreign('equipment_model_id')
                ->references('id')->on('equipment_models')
                ->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::connection('mysql_stockcontrol')->dropIfExists('equipment');
    }
}
