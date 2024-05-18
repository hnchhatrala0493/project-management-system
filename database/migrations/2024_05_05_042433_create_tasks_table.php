<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string("title");
            $table->text("task_description")->nullable();
            $table->dateTime("task_start_date_time");
            $table->dateTime("task_end_date_time");
            $table->string("assign_task_member_id");
            $table->enum('assign_task_status', ['Pending', 'In Progress','Completed','Partial Completed','Others'])->change();
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
        Schema::dropIfExists('tasks');
    }
}