<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class IhracatRakam extends Model
{
    use HasFactory;
    use HasTranslations;
    public $translatable = ['o_birinci','o_ikinci','o_ucuncu','s_birinci','s_ikinci','s_ucuncu'];

}

