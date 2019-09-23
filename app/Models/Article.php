<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use InWeb\Base\Contracts\Cacheable;
use InWeb\Base\Contracts\HasPage;
use InWeb\Base\Entity;
use InWeb\Base\Support\Route;
use InWeb\Base\Traits\Positionable;
use InWeb\Base\Traits\TranslatableSlug;
use InWeb\Media\Thumbnail;
use InWeb\Media\WithContentImages;
use InWeb\Media\WithImages;
use App\Traits\WithMetadata;
use InWeb\Base\Traits\WithStatus;
use Dimsav\Translatable\Translatable;
use Intervention\Image\Constraint;
use Spatie\EloquentSortable\Sortable;

/**
 * Class Article
 *
 * @package App
 * @property string title
 * @property string slug
 * @property string description
 * @property string text
 * @property string popular
 */
class Article extends Entity implements HasPage, Sortable, Cacheable
{
    use Translatable,
        WithContentImages,
        WithStatus,
        Positionable,
        TranslatableSlug,
        WithMetadata,
        WithImages;

    public $translationModel = 'App\Translations\ArticleTranslation';
    public $translatedAttributes = ['title', 'slug', 'description', 'text'];

    public function path()
    {
        return Route::localized('article/' . $this->slug);
    }

    public function getImageThumbnails()
    {
        return [
            'catalog'   => new Thumbnail(function (\Intervention\Image\Image $image) {
                return $image->fit(305, 200, function (Constraint $constraint) {
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
        return 'articles';
    }

    public function cacheTag()
    {
        return 'article:' . $this->id;
    }

    public function getDateAttribute()
    {
        return $this->created_at->format('d.m.Y');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public static function scopePopular(Builder $query)
    {
        return $query->where('popular', '=', 1);
    }
}
