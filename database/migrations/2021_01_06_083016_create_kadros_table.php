<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKadrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kadros', function (Blueprint $table) {
            $table->id();
            $table->integer('sektor_id')->nullable();
            $table->string('kadro');
            $table->string('ad_soyad');
            $table->string('unvan');
            $table->string('tel')->nullable();
            $table->string('email')->nullable();
            $table->string('resim');
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
        Schema::dropIfExists('kadros');
    }
}
