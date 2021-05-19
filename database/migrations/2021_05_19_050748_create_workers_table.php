<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('workers', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->string('name');
            $table->boolean('sex')->default(0);
            $table->date('birthday');
            $table->string('cmnd_no');
            $table->date('day_range');
            $table->date('issued_by');
            $table->string('address');
            $table->string('phone');
            $table->date('day_work');
            $table->string('email');
            $table->string('level');
            $table->string('certificate');
            $table->string('school');
            $table->string('skill');
            $table->boolean('status')->default(1);
            $table->unsignedBigInteger('deparment_id');
            $table->unsignedBigInteger('position_id');
            $table->unsignedBigInteger('salary_id');
            $table->timestamps();

            $table->foreign('deparment_id')->references('id')->on('deparments');
            $table->foreign('position_id')->references('id')->on('positions');
            $table->foreign('salary_id')->references('id')->on('salaries');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('workers');
    }
}
