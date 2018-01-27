<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TagTask extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tag_task', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tag_id')->unsigned();
            $table->integer('task_id')->unsigned();
            $table->timestamps();

            //forein key
            $table->foreign('tag_id')
                ->references('id')->on('tags')
                ->onDelete('cascade');

            $table->foreign('task_id')
                ->references('id')->on('tasks')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tasks', function (Blueprint $table) {

            $table->dropForeign(['tag_id']);
            $table->dropForeign(['task_id']);
        });
        Schema::dropIfExists('tag_task');
    }
}
