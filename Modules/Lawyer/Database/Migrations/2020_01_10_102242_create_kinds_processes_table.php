<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKindsProcessesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kind_process', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('kind_id')->unsigned();
            $table->bigInteger('process_id')->unsigned();
            $table->bigInteger('entity_id')->unsigned();
            $table->string('number', 50)->nullable();
            $table->smallInteger('order')->default(0);

            $table->foreign('kind_id')->references('id')->on('kinds');
            $table->foreign('process_id')->references('id')->on('processes');
            $table->foreign('entity_id')->references('id')->on('entities');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kind_process');
    }
}
