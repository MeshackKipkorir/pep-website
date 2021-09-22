<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaterialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('materials', function (Blueprint $table) {
            $table->id();
            $table->integer('id_no');
            $table->string('first_name')->nullable();
            $table->string('middle_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('mobile_no');
            $table->string('gender')->nullable();
            $table->string('t_shirt')->nullable();
            $table->string('leso')->nullable();
            $table->string('apron')->nullable();
            $table->string('overall')->nullable();
            $table->integer('cash_token_one')->nullable();
            $table->integer('cash_token_two')->nullable();
            $table->integer('requested')->nullable();
            $table->integer('sent')->nullable();
            $table->integer('issued')->nullable();
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
        Schema::dropIfExists('materials');
    }
}
