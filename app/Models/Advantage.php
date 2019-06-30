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
use Dimsav\Translatable\Translatable;
use Intervention\Image\Constraint;
use Spatie\EloquentSortable\Sortable;

/**
 * Class Advantages
 *
 * @package App
 * @property string title
 * @property string slug
 * @property string description
 * @property string text
 */
class Advantage extends Entity implements Sortable, Cacheable
{
    use Translatable,
        WithStatus,
        Positionable,
        WithImages;

    public $translationModel = 'App\Translations\AdvantageTranslation';
    public $translatedAttributes = ['title', 'description'];

    public static function clearCache(Cacheable $model = null)
    {
        \Cache::tags(self::cacheTagAll())->flush();
    }

    public static function cacheTagAll()
    {
        return 'advantages';
    }

    public function cacheTag()
    {
        return 'advantage:' . $this->id;
    }

    public function getDescriptionAttribute($value)
    {
        return preg_replace('/(^<p>)|(<\/p>$)/', '', $value);
    }
}
