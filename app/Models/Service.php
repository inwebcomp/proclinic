<?php

namespace App\Models;

use App\Traits\WithMetadata;
use Dimsav\Translatable\Translatable;
use Intervention\Image\Constraint;
use InWeb\Base\Contracts\Cacheable;
use InWeb\Base\Contracts\HasPage;
use InWeb\Base\Contracts\Nested;
use InWeb\Base\Entity;
use InWeb\Base\Traits\Positionable;
use InWeb\Base\Traits\TranslatableSlug;
use InWeb\Base\Traits\WithStatus;
use InWeb\Media\Images\Thumbnail;
use InWeb\Media\Images\WithContentImages;
use InWeb\Media\Images\WithImages;
use Kalnoy\Nestedset\NodeTrait;
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
class Service extends Entity implements HasPage, Sortable, Cacheable, Nested
{
    use Translatable,
        WithContentImages,
        WithStatus,
        Positionable,
        TranslatableSlug,
        WithMetadata,
        WithImages,
        NodeTrait;

    public $translationModel = 'App\Translations\ServiceTranslation';
    public $translatedAttributes = ['title', 'slug', 'description', 'text'];

    public function path()
    {
        return route('service', [$this->slug], false);
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
