<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documents', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('doctype_id')->unsigned();
            $table->string('name');
            $table->string('description', 191)->nullable();
            $table->mediumText('content');
            $table->string('sts',30)->nullable();
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('doctype_id')->references('id')->on('doctypes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('documents');
    }
}
