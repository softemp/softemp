<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderOutsTable extends Migration
{
    public function up()
    {
        Schema::connection('mysql_stockcontrol')->create('order_outs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('technical_id')->unsigned();
            $table->integer('status')->default(1);
            $table->timestamps();

            $table->foreign('technical_id')
                ->references('id')->on('technicals')
                ->onDelete('restrict');

        });
    }

    public function down()
    {
        Schema::connection('mysql_stockcontrol')->dropIfExists('order_outs');
    }
}
