<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RenamePagIbigColumnInApplicantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('applicants', function (Blueprint $table) {
            $table->dropColumn('pag-ibig');
            $table->string('pag_ibig')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
}
