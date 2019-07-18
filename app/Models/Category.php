<?php

namespace App\Models;

use App\Traits\WithMetadata;
use Dimsav\Translatable\Translatable;
use InWeb\Base\Contracts\HasPage;
use InWeb\Base\Entity;
use InWeb\Base\Support\Route;
use InWeb\Base\Traits\Positionable;
use InWeb\Base\Traits\TranslatableSlug;
use InWeb\Base\Traits\WithStatus;

/**
 * Class Category
 *
 * @package App
 * @property string title
 * @property string slug
 */
class Category extends Entity implements HasPage
{
    use Translatable,
        WithStatus,
        Positionable,
        TranslatableSlug,
        WithMetadata;

    public $translationModel = 'App\Translations\CategoryTranslation';
    public $translatedAttributes = ['title', 'slug'];

    public function path()
    {
        return Route::localized('blog/' . $this->slug);
    }

    public static function allPath()
    {
        return Route::localized('blog');
    }

    public function articles()
    {
        return $this->hasMany(Article::class);
    }

    public function getArticlesCountAttribute()
    {
        return $this->articles()->published()->count();
    }
}
