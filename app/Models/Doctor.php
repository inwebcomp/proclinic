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
use Illuminate\Support\Facades\App;
use Intervention\Image\Constraint;
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
