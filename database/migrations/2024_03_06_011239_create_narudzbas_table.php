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
        Schema::create('narudzbas', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('mobitel')->nullable();
            $table->string('adresa')->nullable();
            $table->string('user_id')->nullable();

            $table->string('naziv_proizvoda')->nullable();
            $table->string('količina')->nullable();
            $table->string('cijena')->nullable();
            $table->string('slika')->nullable();
            $table->string('proizvodi_id')->nullable();

            $table->string('status_placanja')->nullable();
            $table->string('status_isporuke')->nullable();

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
        Schema::dropIfExists('narudzbas');
    }
};
