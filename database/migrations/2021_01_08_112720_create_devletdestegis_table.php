<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDevletdestegisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('devletdestegis', function (Blueprint $table) {
            $table->id();
            $table->string('image');
            $table->text('altbaslik');
            $table->text('metinbaslik')->nullable();
            $table->text('metin')->nullable();
            $table->string('link')->nullable();
            $table->text('link_baslik')->nullable();
            $table->text('link_altbaslik')->nullable();
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
        Schema::dropIfExists('devletdestegis');
    }
}
