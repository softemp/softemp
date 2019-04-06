<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEquipmentDestinationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql_stockcontrol')->create('equipment_destinations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('equipment_id');
            $table->unsignedBigInteger('order_out_id');
            $table->text('destination');
            $table->timestamps();

            $table->foreign('equipment_id')
                ->references('id')->on('equipment')
                ->onDelete('restrict');

            $table->foreign('order_out_id')
                ->references('id')->on('order_outs')
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
        Schema::connection('mysql_stockcontrol')->dropIfExists('equipment_destinations');
    }
}
