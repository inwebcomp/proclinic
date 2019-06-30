<?php

namespace App\Translations;

use Illuminate\Database\Eloquent\Model;

class ClinicTranslation extends Model
{
    public $timestamps = false;

    protected $fillable = ['title', 'description', 'link'];
}
