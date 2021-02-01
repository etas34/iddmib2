<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSektorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sektors', function (Blueprint $table) {
            $table->id();
            $table->text('baslik');
            $table->text('alt_baslik');
            $table->text('metin_baslik');
            $table->text('aciklama');
            $table->text('sektor_link_baslik');
            $table->text('sektor_link_altbaslik');
            $table->string('sektor_resim');
            $table->string('sektor_link');
            $table->string('gtip_pdf');
            $table->string('tanitim_pdf');
            $table->string('ana_resim');
            $table->string('detay_resim');
            $table->tinyInteger('durum')->default(1);
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
        Schema::dropIfExists('sektors');
    }
}
