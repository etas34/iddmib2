<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBaskaninMesajisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('baskanin_mesajis', function (Blueprint $table) {
            $table->id();
            $table->text('baslik')->nullable();
            $table->text('alt_baslik')->nullable();
            $table->text('metin_baslik')->nullable();
            $table->text('metin')->nullable();
            $table->string('image')->nullable();
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
        Schema::dropIfExists('baskanin_mesajis');
    }
}
