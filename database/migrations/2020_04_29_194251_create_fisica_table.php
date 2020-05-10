<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFisicaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('persona_fisicas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('nationality')->default('brasileira');
            $table->char('cpf', 14);
            $table->char('rg', 20)->nullable();
            $table->char('ctps', 20)->nullable();
            $table->char('cnh', 20)->nullable();
            $table->char('passport', 20)->nullable();
            $table->char('nit', 20)->nullable();
            $table->string('civil_status', 30);
            $table->string('profession', 30);
            $table->string('profession_class', 30)->nullable();
            $table->string('profession_number', 30)->nullable();
            $table->string('capacity', 30);
            $table->date('birthday')->nullable();
            $table->date('death')->nullable();
            $table->char('gender', 1)->nullable();

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
        Schema::dropIfExists('persona_fisicas');
    }
}
