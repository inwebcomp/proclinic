<?php

namespace App\Models;

use InWeb\Base\Contracts\Cacheable;
use InWeb\Base\Entity;
use InWeb\Base\Support\Route;
use InWeb\Base\Traits\Positionable;
use InWeb\Base\Traits\WithStatus;
use Dimsav\Translatable\Translatable;
use Intervention\Image\Constraint;
use InWeb\Media\Images\WithImages;
use Spatie\EloquentSortable\Sortable;

/**
 * Class Clinic
 *
 * @package App
 * @property string title
 * @property string slug
 * @property string description
 * @property string text
 */
class Clinic extends Entity implements Sortable, Cacheable
{
    use Translatable,
        WithStatus,
        Positionable,
        WithImages;

    public $translationModel = 'App\Translations\ClinicTranslation';
    public $translatedAttributes = ['title', 'description', 'link'];

    public function getImageThumbnails()
    {
        return [
            'big' => new Thumbnail(function (\Intervention\Image\Image $image) {
                return $image->fit(720, 410, function (Constraint $constraint) {
                    $constraint->upsize();
                });
            }, true),
            'small' => new Thumbnail(function (\Intervention\Image\Image $image) {
                return $image->fit(470, 232, function (Constraint $constraint) {
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
        return 'clinics';
    }

    public function cacheTag()
    {
        return 'clinic:' . $this->id;
    }

    public function getLinkAttribute($value)
    {
        return $value ? Route::localized($value) : false;
    }

    public function getDescriptionAttribute($value)
    {
        return preg_replace('/(^<p>)|(<\/p>$)/', '', $value);
    }
}
