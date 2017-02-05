<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePetTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pet', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('species');
            $table->integer('breed');
            $table->integer('gender');
            $table->integer('weight')->default('0');
            $table->date('birth_date')->nullable();
            $table->boolean('neutered')->default('0');
            $table->boolean('microchipped')->default('0');
            $table->string('clinic_name')->default('');
            $table->string('special_notes')->default('');
            $table->string('description')->default('');
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
        Schema::dropIfExists('pet');
    }
}
