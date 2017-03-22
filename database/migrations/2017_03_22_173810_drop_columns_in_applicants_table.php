<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropColumnsInApplicantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::table('applicants', function (Blueprint $table) {
           $table->dropColumn('annual_physical_exam');
           $table->dropColumn('sss')->nullable();
           $table->dropColumn('philhealth')->nullable();
           $table->dropColumn('pag-ibig')->nullable();
           $table->dropColumn('health_status')->nullable();
           $table->dropColumn('nbi_clearance')->nullable();
           $table->dropColumn('tin')->nullable();
         });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

    }
}
