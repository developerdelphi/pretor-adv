<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('persona_id')->unsigned();
            $table->string('place', 100);
            $table->string('district', 30);
            $table->string('complement', 50)->nullable();
            $table->string('city', 50)->nullable();
            $table->string('uf', 2)->nullable();
            $table->string('cep', 20)->nullable();
            $table->string('email', 50)->nullable();
            $table->string('obs', 191)->nullable();
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
        Schema::dropIfExists('addresses');
    }
}
