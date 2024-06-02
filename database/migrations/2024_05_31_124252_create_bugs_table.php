<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBugsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bugs', function (Blueprint $table) {
            $table->id();
            $table->string('bug_no');
            $table->string('title');
            $table->text('description');
            $table->unsignedBigInteger('project_id');
            $table->string('image');
            $table->enum('status',['Open','Closed','Reopen','Feedback','Resolved']);
            $table->enum('type',['Web','API','Design','Other']);
            $table->string('assigned_member_id');
            $table->string('comment_by_developer');
            $table->string('comment_by_creator');
            $table->unsignedBigInteger('created_by');
            $table->unsignedBigInteger('updated_by');
            $table->enum('status_by_creator',['open','closed','reopen','feedback','resolved']);
            $table->enum('status_by_developer',['open','closed','reopen','feedback','resolved']);
            $table->foreign('project_id')->references('id')->on('projects');
            $table->foreign('created_by')->references('id')->on('users');
            $table->foreign('updated_by')->references('id')->on('users');
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
        Schema::dropIfExists('bugs');
    }
}