<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIhracatPagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ihracat_pages', function (Blueprint $table) {
            $table->id();
            $table->text('baslik');
            $table->text('altbaslik');
            $table->text('metinbaslik');
            $table->text('metin');
            $table->string('image');
            $table->text('link_baslik');
            $table->text('link_altbaslik');
            $table->string('link');
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
        Schema::dropIfExists('ihracat_pages');
    }
}
