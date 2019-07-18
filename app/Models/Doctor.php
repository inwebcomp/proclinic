<?php

namespace App\Models;

use App\Traits\WithMetadata;
use Dimsav\Translatable\Translatable;
use Intervention\Image\Constraint;
use InWeb\Base\Contracts\Cacheable;
use InWeb\Base\Contracts\HasPage;
use InWeb\Base\Entity;
use InWeb\Base\Support\Route;
use InWeb\Base\Traits\Positionable;
use InWeb\Base\Traits\TranslatableSlug;
use InWeb\Base\Traits\WithStatus;
use InWeb\Media\Thumbnail;
use InWeb\Media\WithContentImages;
use InWeb\Media\WithImages;
use Spatie\EloquentSortable\Sortable;

/**
 * Class Doctor
 *
 * @package App
 * @property string title
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
    public $translationModel = 'App\Translations\DoctorTranslation';
    public $translatedAttributes = ['title', 'slug', 'description', 'text'];

    public function path()
    {
        return route('doctor', Route::pathLocale(), $this->slug);
    }

    public function getImageThumbnails()
    {
        return [
            'catalog' => new Thumbnail(function (\Intervention\Image\Image $image) {
                return $image->fit(216, 272, function (Constraint $constraint) {
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
