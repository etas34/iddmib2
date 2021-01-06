<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Inovasyon extends Model
{
    use HasFactory;
    use HasTranslations;
    public $translatable = ['baslik','alt_baslik','metin_baslik','metin','link_altbaslik','link_baslik'];
}
