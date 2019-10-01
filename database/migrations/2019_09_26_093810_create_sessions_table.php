<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSessionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sessions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('classroom_section_id')->unsigned();
            $table->foreign('classroom_section_id')->references('id')->on('classroom_sections')->onDelete('cascade');
            $table->string('title');
            $table->time('from');
            $table->time('to');
            $table->date('session_date');
            $table->integer('order')->default(0);
            $table->integer('score')->default(1);
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
        Schema::dropIfExists('sessions');
    }
}
