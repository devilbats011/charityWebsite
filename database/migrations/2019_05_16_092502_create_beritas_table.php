<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBeritasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('beritas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('tajuk');
            $table->string('text1',5000)->nullable();
            $table->string('text2',5000)->nullable();
             $table->string('text3',5000)->nullable();
           $table->string('gambar1')->nullable();
            $table->string('gambar2')->nullable();
             $table->string('gambar3')->nullable();
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
        Schema::dropIfExists('beritas');
    }
}
