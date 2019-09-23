<?php

namespace App\Translations;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class DoctorTranslation extends Model
{
    public $timestamps = false;

    use Sluggable;

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    protected $casts = [
        'features' => 'array'
    ];

    protected $fillable = ['name', 'slug', 'description', 'text', 'specialization', 'quote', 'features'];
}
