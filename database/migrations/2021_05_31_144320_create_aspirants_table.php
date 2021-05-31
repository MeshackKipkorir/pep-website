<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAspirantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aspirants', function (Blueprint $table) {
            $table->id();
            $table->string('surname');
            $table->string('other_names')->nullable();
            $table->integer('mobile_no');
            $table->string('email');
            $table->integer('id_number');
            $table->date('dob');
            $table->string('gender');
            $table->string('position');
            $table->string('special_interest')->nullable();
            $table->string('county');
            $table->string('constituency');
            $table->string('ward');
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
        Schema::dropIfExists('aspirants');
    }
}
