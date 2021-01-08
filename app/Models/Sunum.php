<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Sunum extends Model
{
    use HasFactory;
    Use HasTranslations;
    public $translatable = ['aciklama'];

}
