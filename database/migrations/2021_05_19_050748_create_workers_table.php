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
            $table->boolean('sex')->default(0)->comment('status: 0-male, 1-female')->nullable();
            $table->date('birthday')->nullable();
            $table->string('cmnd_no')->nullable();
            $table->date('day_range')->nullable();
            $table->string('issued_by')->nullable();
            $table->string('address')->nullable();
            $table->string('phone')->nullable();
            $table->date('day_work')->nullable();
            $table->string('email')->nullable();
            $table->string('level')->nullable();
            $table->string('certificate')->nullable();
            $table->string('school')->nullable();
            $table->string('skill')->nullable();
            $table->boolean('status')->default(1)->nullable();
            $table->unsignedBigInteger('department_id')->nullable();
            $table->unsignedBigInteger('position_id')->nullable();
            $table->unsignedBigInteger('salary_id')->nullable();
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
        Schema::dropIfExists('workers');
    }
}
