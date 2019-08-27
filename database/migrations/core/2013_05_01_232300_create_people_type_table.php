<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePeopleTypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('people_type', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->unique();
//            $table->enum('type',['1','2'])->comment('1=pessoa física, 2=pessoa jurídica');
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
        Schema::dropIfExists('people_type');
    }
}