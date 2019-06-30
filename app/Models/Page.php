<?php

namespace App\Models;

use App\Contracts\HasPage;
use App\Route;
use App\Traits\Positionable;
use App\Traits\TranslatableSlug;
use App\Traits\WithContentImages;
use App\Traits\WithMetadata;
use App\Traits\WithStatus;
use Dimsav\Translatable\Translatable;
use Laravel\Scout\Searchable;
use Spatie\EloquentSortable\Sortable;

/**
 * Class Page
 *
 * @package App
 * @property string title
 * @property string slug
 * @property string description
 */
class Page extends Entity implements HasPage, Sortable
{
    use Translatable,
        WithContentImages,
        WithStatus,
        Positionable,
        TranslatableSlug,
        WithMetadata;

    public $translationModel = 'App\Translations\PageTranslation';
    public $translatedAttributes = ['title', 'slug', 'text'];

    protected $fillable = [
        'title',
        'slug',
        'text'
    ];

    public function path()
    {
        return Route::localized($this->slug);
    }
}
