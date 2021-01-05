<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Haber extends Model
{
    use HasTranslations;
    public $translatable = ['baslik','aciklama'];
    use HasFactory;
}
