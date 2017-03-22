<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrainingModulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
      public function up()
      {
         Schema::create('training_modules', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('training_id');
            $table->string('path');
            $table->timestamps();
            $table->softDeletes();
         });
      }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
      public function down()
      {
         Schema::dropIfExists('training_modules');
      }
}
