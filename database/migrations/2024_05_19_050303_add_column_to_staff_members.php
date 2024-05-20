<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnToStaffMembers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::table('staff_members', function (Blueprint $table) {
        //     $table->string("father_name");
        //     $table->string("mother_name");
        //     $table->enum("isBrotherOrSister",["Yes","No"])->change();
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::table('staff_members', function (Blueprint $table) {
        //     $table->dropColumn("father_name");
        //     $table->dropColumn("mother_name");
        //     $table->dropColumn("isBrotherOrSister",["Yes","No"])->change();
        // });
    }
}