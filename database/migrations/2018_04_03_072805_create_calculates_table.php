<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCalculatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('calculates', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('order_id');
            $table->string('start_date');
            $table->string('start_time')->nullable();
            $table->string('stop_date')->nullable();
            $table->string('stop_time')->nullable();
            $table->string('total_dist')->nullable();
            $table->string('total_time')->nullable();
            $table->string('charge')->nullable();
            $table->string('total_fuel')->nullable();
            $table->string('fuel_charge')->nullable();
            $table->string('total_charge')->nullable();
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
        Schema::dropIfExists('calculates');
    }
}
