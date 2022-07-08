<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKiaguPollingStationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kiagu_polling_stations', function (Blueprint $table) {
            $table->id();
            $table->string('polling_station_code')->nullable();
            $table->string('polling_station');
            $table->integer('no_of_streams');
            $table->integer('no_of_voters');
            $table->string('location')->nullable();
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
        Schema::dropIfExists('kiagu_polling_stations');
    }
}
