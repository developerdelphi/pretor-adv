<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddressTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('address', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('place', 30);
            $table->string('title');
            $table->string('complement')->nullable();
            $table->string('number', 10)->nullable();
            $table->string('district', 10)->nullable();
            $table->string('city');
            $table->string('uf', 2);
            $table->string('type', 20);
            $table->string('status', 20);

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
        Schema::dropIfExists('address');
    }
}
