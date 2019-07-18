<?php

namespace App\Models;

use InWeb\Base\Contracts\Cacheable;
use InWeb\Base\Entity;
use InWeb\Base\Traits\Positionable;
use InWeb\Media\WithImages;
use InWeb\Base\Traits\WithStatus;
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

    protected $fillable = ['name', 'text'];

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
