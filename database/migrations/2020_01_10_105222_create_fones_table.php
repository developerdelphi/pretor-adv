<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFonesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fones', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('persona_id')->unsigned();
            $table->string('number', 30);
            $table->string('type', 30);
            $table->string('description')->nullable();
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('persona_id')->references('id')->on('personas');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fones');
    }
}
