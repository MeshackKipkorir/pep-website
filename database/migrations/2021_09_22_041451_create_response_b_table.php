<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResponseBTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('response_b', function (Blueprint $table) {
            $table->id();
            $table->integer('id_no');
            $table->string('phone_no');
            $table->string('names');
            $table->string('polling_center');
            $table->integer('received_token')->nullable();
            $table->string('received_token_from')->nullable();
            $table->integer('received_token_amount')->nullable();
            $table->integer('party')->nullable();
            $table->integer('party_symbol')->nullable();
            $table->integer('party_slogan')->nullable();
            $table->integer('official_name')->nullable();
            $table->integer('be_our_agent')->nullable();
            $table->integer('advanced_payment')->nullable();
            $table->integer('vote_for_kabobo')->nullable();
            $table->integer('mobilize')->nullable();
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
        Schema::dropIfExists('response_b');
    }
}
