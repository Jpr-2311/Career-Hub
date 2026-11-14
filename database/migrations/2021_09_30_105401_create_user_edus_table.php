<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserEdusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_edus', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->string('edu_level');
            $table->string('study_field');
            $table->string('school');
            $table->string('present')->nullable();
            $table->string('begin');
            $table->string('end');
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
        Schema::dropIfExists('user_edus');
    }
}
