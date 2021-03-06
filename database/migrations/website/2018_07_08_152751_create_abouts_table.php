<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAboutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql_website')->create('abouts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title',150);
            $table->text('description');
            $table->string('img')->nullable();
            $table->enum('position_img',['pull-left','pull-right'])->default('pull-left');
            //$table->enum('status',['0','1'])->default('0');
            //$table->bigInteger('sort')->default(0);

            $table->unsignedBigInteger('owner_company_id');
            $dataBase = DB::connection('mysql_core')->getDatabaseName();
            $table->foreign('owner_company_id')->references('id')->on($dataBase . '.companies')->onDelete('restrict');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::connection('mysql_website')->dropIfExists('abouts');
    }
}
