<?php

namespace App\Models;

use App\Contracts\Cacheable;
use App\Contracts\HasPage;
use App\Route;
use App\Traits\Positionable;
use App\Traits\TranslatableSlug;
use App\Traits\WithContentImages;
use App\Traits\WithImages;
use App\Traits\WithMetadata;
use App\Traits\WithStatus;
use Carbon\Carbon;
use Dimsav\Translatable\Translatable;
use Intervention\Image\Constraint;
use Spatie\EloquentSortable\Sortable;

/**
 * Class Testimonials
 *
 * @package App
 * @property string title
 * @property string slug
 * @property string description
 * @property string text
 */
class Testimonial extends Entity implements Sortable, Cacheable
{
    use WithStatus,
        Positionable,
        WithImages;

    public static function clearCache(Cacheable $model = null)
    {
        \Cache::tags(self::cacheTagAll())->flush();
    }

    public static function cacheTagAll()
    {
        return 'testimonials';
    }

    public function cacheTag()
    {
        return 'testimonial:' . $this->id;
    }

    public function getDateAttribute()
    {
        return $this->created_at->format('d.m.Y');
    }

    public function getTextAttribute($value)
    {
        return preg_replace('/(^<p>)|(<\/p>$)/', '', $value);
    }
}
