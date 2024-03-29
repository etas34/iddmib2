<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFaliyetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('faliyets', function (Blueprint $table) {
            $table->id();
            $table->string('kategori_id')->nullable();
            $table->text('baslik');
            $table->text('alt_baslik');
            $table->text('metin_baslik');
            $table->text('aciklama');
            $table->string('link_baslik');
            $table->string('link_altbaslik');
            $table->text('link');
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
        Schema::dropIfExists('faliyets');
    }
}
