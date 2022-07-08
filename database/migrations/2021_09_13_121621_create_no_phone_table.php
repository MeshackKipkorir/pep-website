<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNoPhoneTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('no_phone', function (Blueprint $table) {
            $table->id();
            $table->string('first_name')->nullable();
            $table->integer('id_no');
            $table->string('middle_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('age')->nullable();
            $table->string('level_of_education')->nullable();
            $table->string('occupation')->nullable();
            $table->string('gender')->nullable();
            $table->string('polling_station')->nullable();
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
        Schema::dropIfExists('no_phone');
    }
}
