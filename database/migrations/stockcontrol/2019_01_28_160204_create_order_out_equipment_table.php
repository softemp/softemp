<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderOutEquipmentTable extends Migration
{
    public function up()
    {
        Schema::connection('mysql_stockcontrol')->create('order_out_equipment', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('order_out_id');
            $table->unsignedBigInteger('equipment_id');

            $table->timestamps();

            $table->foreign('order_out_id')
                ->references('id')->on('order_outs')
                ->onDelete('restrict');

            $table->foreign('equipment_id')
                ->references('id')->on('equipment')
                ->onDelete('restrict');

        });
    }

    public function down()
    {
        Schema::connection('mysql_stockcontrol')->dropIfExists('order_out_equipment');
    }
}
