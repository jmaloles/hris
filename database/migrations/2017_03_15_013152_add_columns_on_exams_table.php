<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsOnExamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('exams', function (Blueprint $table) {
            $table->integer('applicant_id');
            $table->integer('score');
            $table->string('category');
            $table->string('name');
            $table->string('status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('exams', function (Blueprint $table) {
            $table->dropColumn('applicant_id');
            $table->dropColumn('score');
            $table->dropColumn('category');
            $table->dropColumn('name');
            $table->dropColumn('status');
        });
    }
}
