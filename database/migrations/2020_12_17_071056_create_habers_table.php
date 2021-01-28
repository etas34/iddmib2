<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHabersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('habers', function (Blueprint $table) {
            $table->id();
            $table->integer('sektor_id');
            $table->text('baslik');
            $table->text('alt_baslik');
            $table->text('metin_altbaslik');
            $table->text('aciklama');
            $table->string('tarih');
            $table->string('ana_resim');
            $table->string('detay_resim');

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
        Schema::dropIfExists('habers');
    }
}
