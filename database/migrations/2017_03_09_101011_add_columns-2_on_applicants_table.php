<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumns2OnApplicantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('applicants', function (Blueprint $table) {
            $table->string('emergency_person');
            $table->string('emergency_person_contact');
            $table->text('emergency_person_address');
            $table->string('resume_path');
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
            $table->dropColumn('emergency_person');
            $table->dropColumn('emergency_person_contact');
            $table->dropColumn('emergency_person_address');
            $table->dropColumn('resume_path');
        });
    }
}
