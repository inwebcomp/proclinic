<?php

namespace App\Translations;

use Illuminate\Database\Eloquent\Model;

class AdvantageTranslation extends Model
{
    public $timestamps = false;

    protected $fillable = ['title', 'description'];
}
