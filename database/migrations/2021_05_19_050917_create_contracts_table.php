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
            $table->date('start_day')->nullable();
            $table->date('end_day')->nullable();
            $table->string('wage')->nullable();
            $table->boolean('status')->default(1)->nullable();
            $table->unsignedBigInteger('worker_id')->nullable();
            $table->unsignedBigInteger('contract_type_id')->nullable();
            $table->unsignedBigInteger('record_id')->nullable();
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
        Schema::dropIfExists('contracts');
    }
}
