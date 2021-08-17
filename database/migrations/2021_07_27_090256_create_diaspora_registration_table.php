<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiasporaRegistrationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diaspora_registration', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('gender');
            $table->string('email');
            $table->integer('diaspora_phone_number');
            $table->integer('local_phone_number');
            $table->string('passport_no');
            $table->string('county');
            $table->string('constituency');
            $table->string('ward');
            $table->string('country_of_residence');
            $table->string('state_of_residence');
            $table->string('city_of_residence');
            $table->string('profession');
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
        Schema::dropIfExists('diaspora_registration');
    }
}
