<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContractsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contracts', function (Blueprint $table) {
            $table->id();
            $table->date('start_day');
            $table->date('end_day');
            $table->string('wage');
            $table->boolean('status')->default(1);
            $table->unsignedBigInteger('worker_id');
            $table->unsignedBigInteger('contract_type_id');
            $table->unsignedBigInteger('record_id');
            $table->timestamps();

            $table->foreign('worker_id')->references('id')->on('workers');
            $table->foreign('contract_type_id')->references('id')->on('contractTypes');
            $table->foreign('record_id')->references('id')->on('records');
        
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contracts');
    }
}
