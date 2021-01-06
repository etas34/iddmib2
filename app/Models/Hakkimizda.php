<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Hakkimizda extends Model
{
    use HasFactory;
    use HasTranslations;
    public $translatable = ['altbaslik','metinbaslik','metin'];
}
