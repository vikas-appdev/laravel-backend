<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDistToCalculate extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('calculates', function($table) {
            $table->string('open_dist')->nullable()->after('start_time');
            $table->string('end_dist')->nullable()->after('stop_time');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('calculates', function($table) {
            $table->dropColumn('open_dist');
             $table->dropColumn('end_dist');            
        });
    }
}
