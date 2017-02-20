<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RenamePendingUsersToApplicantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::rename('pending_users', 'applicants');

        Schema::table('applicants', function(Blueprint $blueprint) {
            $blueprint->dropColumn('employee_id');
        });

        Schema::table('applicants', function(Blueprint $blueprint) {
            $blueprint->date('date_of_birth');
            $blueprint->integer('age');
            $blueprint->boolean('gender');
            $blueprint->string('address');
            $blueprint->string('mobile_number')->nullable();
            $blueprint->string('home_number')->nullable();
            $blueprint->boolean('initial_interview');
            $blueprint->boolean('exam_interview');
            $blueprint->boolean('final_interview');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('applicants');

        Schema::dropIfExists('pending_users');

        Schema::table('applicants', function(Blueprint $blueprint) {
            $blueprint->dropColumn('date_of_birth');
            $blueprint->dropColumn('age');
            $blueprint->dropColumn('gender');
            $blueprint->dropColumn('address');
            $blueprint->dropColumn('mobile_number');
            $blueprint->dropColumn('home_number');
            $blueprint->dropColumn('initial_interview');
            $blueprint->dropColumn('exam_interview');
            $blueprint->dropColumn('final_interview');
        });
    }
}
