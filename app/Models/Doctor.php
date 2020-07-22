<?php

namespace App\Models;

use App\Traits\WithMetadata;
use Dimsav\Translatable\Translatable;
use Intervention\Image\Constraint;
use InWeb\Base\Contracts\Cacheable;
use InWeb\Base\Contracts\HasPage;
use InWeb\Base\Entity;
use InWeb\Base\Traits\Positionable;
use InWeb\Base\Traits\TranslatableSlug;
use InWeb\Base\Traits\WithStatus;
use InWeb\Media\Images\Thumbnail;
use InWeb\Media\Images\WithContentImages;
use InWeb\Media\Images\WithImages;
use Spatie\EloquentSortable\Sortable;

/**
 * Class Doctor
 *
 * @package App
 * @property string name
 * @property string slug
 * @property string description
 * @property string text
 */
class Doctor extends Entity implements HasPage, Sortable, Cacheable
{
    use Translatable,
        WithContentImages,
        WithStatus,
        Positionable,
        TranslatableSlug,
        WithMetadata,
        WithImages;
    public $translationModel     = 'App\Translations\DoctorTranslation';
    public $translatedAttributes = ['name', 'slug', 'description', 'text', 'specialization', 'quote', 'features'];

    public function path()
    {
        return route('doctor', [$this->slug], false);
    }

    public function getImageThumbnails()
    {
        return [
            'catalog'   => new Thumbnail(function (\Intervention\Image\Image $image) {
                return $image->fit(269, 290, function (Constraint $constraint) {
                    $constraint->upsize();
                });
            }, true),
            'info-main' => new Thumbnail(function (\Intervention\Image\Image $image) {
                return $image->resize(370, null, function (Constraint $constraint) {
                    $constraint->aspectRatio();
                });
            }, true),
            'info'      => new Thumbnail(function (\Intervention\Image\Image $image) {
                return $image->fit(570, 380, function (Constraint $constraint) {
                    $constraint->upsize();
                });
            }),
        ];
    }

    public static function clearCache(Cacheable $model = null)
    {
        \Cache::tags(self::cacheTagAll())->flush();
    }

    public static function cacheTagAll()
    {
        return 'doctors';
    }

    public function cacheTag()
    {
        return 'doctor:' . $this->id;
    }

    public function getDescriptionAttribute($value)
    {
        return preg_replace('/(^<p>)|(<\/p>$)/', '', $value);
    }
}
