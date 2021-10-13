<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCallCenterTwoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('call_center_two', function (Blueprint $table) {
            $table->id();
            $table->integer('id_no');
            $table->string('phone_no');
            $table->string('names');
            $table->string('polling_center');
            $table->integer('voting_status')->nullable();
            $table->string('call_status');
            $table->string('calling_agent');
            $table->integer('candidate')->nullable();
            $table->string('voting_reason')->nullable();
            $table->integer('consider_kabobo')->nullable();
            $table->string('make_you_vote')->nullable();
            $table->integer('received_token')->nullable();
            $table->integer('current_token_no')->nullable();
            $table->integer('updated_token_no')->nullable();
            $table->integer('mobilize_for_kabobo')->nullable();
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
        Schema::dropIfExists('call_center_two');
    }
}
