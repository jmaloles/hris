<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModifyDisciplinaryActionsTemplateColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Change memorandum_id to disciplinary_action_id
        Schema::table('disciplinary_action_templates', function (Blueprint $table) {
            $table->renameColumn('memorandum_id', 'disciplinary_action_id');
            $table->string('content')->nullable()->change();
            $table->string('sender')->nullable()->change();
            $table->string('topic')->nullable()->change();
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
        
    }
}
