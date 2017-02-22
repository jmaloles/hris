<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsOnEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('employees', function (Blueprint $table) {
            $table->string('sss')->nullable();
            $table->string('philhealth')->nullable();
            $table->string('pag-ibig')->nullable();
            $table->string('health_status')->nullable();
            $table->string('status')->nullable();
            $table->string('salary')->nullable();
            $table->string('email')->nullable();
            $table->string('nbi_clearance')->nullable();
            $table->string('tin')->nullable();
            $table->string('department')->nullable();
            $table->integer('vl_remaining')->nullable();
            $table->integer('sl_remaining')->nullable();
            $table->integer('el_remaining')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('employees', function (Blueprint $table) {
            $table->dropColumn('sss');
            $table->dropColumn('philhealth');
            $table->dropColumn('pag-ibig');
            $table->dropColumn('health_status');
            $table->dropColumn('status');
            $table->dropColumn('salary');
            $table->dropColumn('email');
            $table->dropColumn('nbi_clearance');
            $table->dropColumn('tin');
            $table->dropColumn('department');
            $table->dropColumn('vl_remaining');
            $table->dropColumn('sl_remaining');
            $table->dropColumn('el_remaining');
        });
    }
}
