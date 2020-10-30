<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('avatar');
            $table->string('link');
            $table->integer('date_start');
            $table->integer('date_end');
            $table->string('location');
            $table->string('form_of_conducting');
            $table->string('event_type');
            $table->string('event_level');
            $table->string('participant_category');
            $table->string('organizer');
            $table->string('curator');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('events');
    }
}
