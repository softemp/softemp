<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBannersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql_website')->create('banners', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('img_background');
            $table->string('img_1')->nullable();
            $table->string('img_2')->nullable();
            $table->string('title_1')->nullable();
            $table->string('title_2')->nullable();
            $table->string('text_1')->nullable();
            $table->string('text_2')->nullable();
            $table->enum('status',['0','1'])->default('0');
            $table->text('page')->comment('de qual pagina é este banner');

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
        Schema::connection('mysql_website')->dropIfExists('banners');
    }
}
