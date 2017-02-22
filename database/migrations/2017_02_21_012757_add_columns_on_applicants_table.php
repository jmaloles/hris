<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsOnApplicantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('applicants', function (Blueprint $table) {
            $table->string('title');
            $table->string('description')->nullable();
            $table->string('job_position');
            $table->string('expected_salary');
            $table->string('middle_initial')->after('last_name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('applicants', function (Blueprint $table) {
            $table->dropColumn('title');
            $table->dropColumn('description')->nullable();
            $table->dropColumn('job_position');
            $table->dropColumn('expected_salary');
            $table->dropColumn('middle_initial')->after('last_name');
        });
    }
}
