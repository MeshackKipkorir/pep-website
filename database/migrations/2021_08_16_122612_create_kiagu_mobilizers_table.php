<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKiaguMobilizersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kiagu_mobilizers', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('middle_name')->nullable();
            $table->string('last_name')->nullable();
            $table->integer('id_no');
            $table->integer('mobile_no');
            $table->string('gender');
            $table->string('polling_station');
            $table->string('recruitment_status');
            $table->string('agent_type');
            $table->string('reason')->nullable();
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
        Schema::dropIfExists('kiagu_mobilizers');
    }
}
