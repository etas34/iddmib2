<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInovasyonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inovasyons', function (Blueprint $table) {
            $table->id();
            $table->text('baslik');
            $table->text('alt_baslik');
            $table->text('metin_baslik');
            $table->text('metin');
            $table->string('image');
            $table->string('link');
            $table->text('link_baslik');
            $table->text('link_altbaslik');
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
        Schema::dropIfExists('inovasyons');
    }
}
