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
 * Class Service
 *
 * @package App
 * @property string title
 * @property string slug
 * @property string description
 * @property string text
 */
class Service extends Entity implements HasPage, Sortable, Cacheable
{
    use Translatable,
        WithContentImages,
        WithStatus,
        Positionable,
        TranslatableSlug,
        WithMetadata,
        WithImages;
    public $translationModel = 'App\Translations\ServiceTranslation';
    public $translatedAttributes = ['title', 'slug', 'description', 'text'];

    public function path()
    {
        return Route::localized(route('service', $this->slug));
    }

    public function getImageThumbnails()
    {
        return [
            'catalog' => new Thumbnail(function (\Intervention\Image\Image $image) {
                return $image->fit(270, 200, function (Constraint $constraint) {
                    $constraint->upsize();
                });
            }, true),
        ];
    }

    public static function clearCache(Cacheable $model = null)
    {
        \Cache::tags(self::cacheTagAll())->flush();
    }

    public static function cacheTagAll()
    {
        return 'services';
    }

    public function cacheTag()
    {
        return 'service:' . $this->id;
    }

    public function getIconAttribute()
    {
        return $this->images()->notMain()->first() ?? $this->image;
    }

    public function getDescriptionAttribute($value)
    {
        return preg_replace('/(^<p>)|(<\/p>$)/', '', $value);
    }
}
