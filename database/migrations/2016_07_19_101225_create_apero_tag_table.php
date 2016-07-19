<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAperoTagTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apero_tag', function (Blueprint $table) {
            $table->unsignedInteger('apero_id');
            $table->unsignedInteger('tag_id');
            $table->unique(['apero_id', 'tag_id']);
            $table->foreign('apero_id')
                ->references('id')
                ->on('aperos')
                ->onDelete('CASCADE');
            $table->foreign('tag_id')
                ->references('id')
                ->on('tags')
                ->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('apero_tag');
    }
}
