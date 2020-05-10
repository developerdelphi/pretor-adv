<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJuridicaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('persona_juridicas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('fantasy');
            $table->string('type', 30);
            $table->string('cnpj', 20);
            $table->string('insc_estadual', 30)->nullable();
            $table->string('insc_municipal', 30)->nullable();
            $table->string('fundation', 30)->nullable(); //matriz, filial,
            $table->string('status', 20)->default('active');

            $table->softDeletes();
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
        Schema::dropIfExists('persona_juridicas');
    }
}
