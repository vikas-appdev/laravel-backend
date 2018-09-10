<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAcceptNCarSendToEmployee extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('employees', function($table) {
            $table->integer('accept')->default(0)->after('visit');
            $table->string('send_car')->nullable()->after('accept');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::table('employees', function($table) {
            $table->dropColumn('accept');
            $table->dropColumn('send_car');
        });
    }
}
