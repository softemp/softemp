<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestimonialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql_testimonial')->create('testimonials', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('description');

            $table->unsignedBigInteger('client_id');
            $dataBase = DB::connection('mysql_core')->getDatabaseName();
            $table->foreign('client_id')->references('id')->on($dataBase . '.people')->onDelete('restrict');

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
        Schema::connection('mysql_testimonial')->dropIfExists('testimonials');
    }
}
