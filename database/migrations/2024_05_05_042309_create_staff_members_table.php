<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStaffMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('staff_members', function (Blueprint $table) {
            $table->id();
            $table->integer("profile_id");
            $table->string("full_name");
            $table->string("father_name");
            $table->string("mother_name");
            $table->enum("isBrotherOrSister",["Yes","No"]);
            $table->timestamp("date_of_birth")->nullable();
            $table->timestamp("date_of_anniversary")->nullable();
            $table->timestamp("date_of_joining")->nullable();
            $table->string("salary");
            $table->string("blood_group");
            $table->text("history_of_previous_company")->nullable();
            $table->enum('status', ['Active', 'Inactive']);
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
        Schema::dropIfExists('staff_members');
    }
}