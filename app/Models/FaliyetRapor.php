<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class FaliyetRapor extends Model
{
    use HasFactory;
    use HasTranslations;
    public $translatable = ['aciklama'];
}
