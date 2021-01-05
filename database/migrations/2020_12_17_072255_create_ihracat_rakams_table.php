<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIhracatRakamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ihracat_rakams', function (Blueprint $table) {
            $table->id();
            $table->integer('sektor_id');
            $table->text('o_birinci');
            $table->text('o_ikinci');
            $table->text('o_ucuncu');
            $table->text('s_birinci');
            $table->text('s_ikinci');
            $table->text('s_ucuncu');
            $table->string('guncelleme_tarih');
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
        Schema::dropIfExists('ihracat_rakams');
    }
}
