<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /**
         * Организация связующей таблицы
         */
        Schema::create('event_tags', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('event_id');
            $table->unsignedBigInteger('tag_id');
            $table->index('event_id', 'event_tag_event_idx');
            $table->index('tag_id', 'event_tag_tag_idx');
            $table->foreign('event_id', 'event_tag_event_fk')->on('events')->references('id');
            $table->foreign('tag_id', 'event_tag_tag_fk')->on('tags')->references('id');
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
        Schema::dropIfExists('event_tags');
    }
}