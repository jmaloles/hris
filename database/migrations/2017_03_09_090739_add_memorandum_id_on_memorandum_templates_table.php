<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddMemorandumIdOnMemorandumTemplatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('memorandum_templates', function (Blueprint $table) {
            $table->integer('memorandum_id')->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('memorandum_templates', function (Blueprint $table) {
            $table->dropColumn('memorandum_id');
        });
    }
}
