<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Ihracatrotasi extends Model
{
    use HasFactory;
    use HasTranslations;

    public $translatable = ['altbaslik','metinbaslik', 'metin','link_baslik','link_altbaslik'];

}
