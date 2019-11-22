<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->text('body');
            $table->boolean('done');
            $table->timestamps();
            $table->text('title_task_1');
            $table->text('title_task_2');
            $table->text('title_task_3');
            $table->text('task_1');
            $table->text('task_2');
            $table->text('task_3');
            $table->boolean('task_1_done');
            $table->boolean('task_2_done');
            $table->boolean('task_3_done');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
