<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCabsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cabs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('owner');
            $table->string('car_type');
            $table->string('visit');
            $table->string('avg_speed');
            $table->string('milage');                      
            $table->string('charges_per_distance');
            $table->string('fuelcharges_per_ltr');
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
        Schema::dropIfExists('cabs');
    }
}
