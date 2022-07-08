<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResponseCTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('response_c', function (Blueprint $table) {
            $table->id();
            $table->integer('id_no');
            $table->string('phone_no');
            $table->string('names');
            $table->string('polling_center');
            $table->integer('confirm_receive_token')->nullable();
            $table->integer('vote_for_kabobo')->nullable();
            $table->integer('will_mobilize')->nullable();
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
        Schema::dropIfExists('response_c');
    }
}
