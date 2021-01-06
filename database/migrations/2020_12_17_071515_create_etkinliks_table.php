<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEtkinliksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('etkinliks', function (Blueprint $table) {
            $table->id();
            $table->integer('kategori_id');
            $table->integer('sektor_id');
            $table->text('baslik');
            $table->text('alt_baslik');
            $table->date('tarih');

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
        Schema::dropIfExists('etkinliks');
    }
}
