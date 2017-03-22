<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAnnualPhysicalExamColumnInEmployeesTable extends Migration
{
   /**
   * Run the migrations.
   *
   * @return void
   */
   public function up()
   {
      Schema::table('employees', function (Blueprint $table) {
         $table->string('annual_physical_exam');
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
