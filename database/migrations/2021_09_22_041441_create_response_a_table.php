<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResponseATable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('response_a', function (Blueprint $table) {
            $table->id();
            $table->integer('id_no');
            $table->string('phone_no');
            $table->string('names');
            $table->string('polling_center');
            $table->integer('voting_status');
            $table->string('call_status');
            $table->string('calling_agent');
            $table->integer('candidate')->nullable();
            $table->string('voting_reason')->nullable();
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
        Schema::dropIfExists('response_a');
    }
}
