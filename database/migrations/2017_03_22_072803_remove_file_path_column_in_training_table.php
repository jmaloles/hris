<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RemoveFilePathColumnInTrainingTable extends Migration
{
   /**
  * Run the migrations.
  *
  * @return void
  */
   public function up()
   {
      Schema::table('training', function (Blueprint $table) {
         $table->dropColumn('file_path');
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
