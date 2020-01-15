<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocumentsProcessesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documents_processes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('document_id')->unsigned();
            $table->bigInteger('process_id')->unsigned();
            $table->string('sts', 30)->nullable();
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('document_id')->references('id')->on('documents');
            $table->foreign('process_id')->references('id')->on('processes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('documents_processes');
    }
}
