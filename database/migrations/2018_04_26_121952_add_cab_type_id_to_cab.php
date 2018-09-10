<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCabTypeIdToCab extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cabs', function($table) {
            $table->string('car_type')->nullable()->change();
            $table->string('cab_type')->after('owner');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cabs', function($table) {
            $table->string('car_type')->nullable(false)->change();
            $table->dropColumn('cab_type');            
        });
    }
}
