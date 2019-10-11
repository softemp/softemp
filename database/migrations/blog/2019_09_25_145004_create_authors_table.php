<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAuthorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql_blog')->create('authors', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('employee_id');
            $dataBase = DB::connection('mysql_core')->getDatabaseName();
            $table->foreign('employee_id')->references('id')->on($dataBase . '.physical')->onDelete('restrict');

            $table->unsignedBigInteger('owner_company_id');
            $dataBase = DB::connection('mysql_core')->getDatabaseName();
            $table->foreign('owner_company_id')->references('id')->on($dataBase . '.companies')->onDelete('restrict');


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
        Schema::connection('mysql_blog')->dropIfExists('authors');
    }
}
