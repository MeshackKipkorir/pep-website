<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePledgesReportTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pledges_report', function (Blueprint $table) {
            $table->id();
            $table->string('names');
            $table->string('phone_number');
            $table->string('constituency');
            $table->string('response')->nullable();
            $table->string('call_status');
            $table->string('calling_agent');
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
        Schema::dropIfExists('pledges_report');
    }
}
