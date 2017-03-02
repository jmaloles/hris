<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeeMemorandumTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_memorandum', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('employee_id');
            $table->integer('memorandum_id');
            $table->boolean('first_warning');
            $table->boolean('second_warning');
            $table->boolean('third_warning');
            $table->boolean('fourth_warning');
            $table->date('refresh_date');
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
        Schema::dropIfExists('employee_memorandum');
    }
}
