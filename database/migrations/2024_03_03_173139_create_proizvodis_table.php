<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proizvodis', function (Blueprint $table) {
            $table->id();
            $table->string('naziv')->nullable();
            $table->string('opis')->nullable();
            $table->string('slika')->nullable();
            $table->string('kategorije')->nullable();
            $table->string('količina')->nullable();
            $table->string('cijena')->nullable();
            $table->string('popust')->nullable();
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
        Schema::dropIfExists('proizvodis');
    }
};
