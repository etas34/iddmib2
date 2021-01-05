<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Sektor extends Model
{
    use HasFactory;
    use HasTranslations;

    public $translatable = ['baslik', 'alt_baslik','metin_baslik', 'aciklama','sektor_link_baslik','sektor_link_altbaslik'];

    public function etkinliks()
    {
        return $this->hasMany(Etkinlik::class);
    }

}
