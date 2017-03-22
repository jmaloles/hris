<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumns2InApplicantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('applicants', function (Blueprint $table) {
           $table->string('sss')->nullable();
           $table->string('philhealth')->nullable();
           $table->string('pag-ibig')->nullable();
           $table->string('health_status')->nullable();
           $table->string('nbi_clearance')->nullable();
           $table->string('tin')->nullable();
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
