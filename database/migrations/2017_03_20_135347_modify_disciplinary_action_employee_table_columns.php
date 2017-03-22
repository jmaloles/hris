<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModifyDisciplinaryActionEmployeeTableColumns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('disciplinary_action_employee', function (Blueprint $table) {
            $table->renameColumn('memorandum_id', 'disciplinary_action_id');
        });

        Schema::table('disciplinary_action_employee', function (Blueprint $table) {
            $table->renameColumn('first_warning', 'level_warning');
            $table->dropColumn('second_warning');
            $table->dropColumn('third_warning');
            $table->dropColumn('fourth_warning');
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
