<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVetTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vet', function (Blueprint $table) {
            $table->increments('id');
            $table->string('full_name');
            $table->string('title');
            $table->double('price', 9, 2);
            $table->string('bio')->default('');
            $table->string('avatar_path')->default('');
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
        Schema::dropIfExists('vet');
    }
}
