<?php

namespace App\Admin\Resources;

use Admin\ResourceTools\Images\Images;
use Admin\ResourceTools\Metadata\Metadata;
use App\Admin\Actions\Hide;
use App\Admin\Actions\Publish;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use InWeb\Admin\App\Fields\Boolean;
use InWeb\Admin\App\Fields\Editor;
use InWeb\Admin\App\Fields\Select;
use InWeb\Admin\App\Fields\Text;
use InWeb\Admin\App\Fields\Textarea;
use InWeb\Admin\App\Filters\OnPage;
use InWeb\Admin\App\Filters\Status;
use InWeb\Admin\App\Http\Requests\AdminRequest;
use InWeb\Admin\App\Resources\Resource;

class Article extends Resource
{
    public static $model = \App\Models\Article::class;
    protected static $position = 7;

    public static $with = ['translations'];

    public static $globallySearchable = true;

    public static $search = [
        'title'
    ];

    public function title()
    {
        return $this->title;
    }

    public static function label()
    {
        return __('Статьи');
    }

    public static function singularLabel()
    {
        return __('Статья');
    }

    public static function uriKey()
    {
        return 'article';
    }

    public function href()
    {
        return $this->path();
    }

    /**
     * Get the fields displayed by the resource.
     *
     * @param AdminRequest $request
     * @return array
     */
    public function fields(AdminRequest $request)
    {
        return [
            Text::make(__('Название'), 'title')->link($this->editPath()),
            Text::make(__('URL ID'), 'slug'),
            Select::make(__('Категория'), 'category_id')->displayUsing(function($value) {
                return optional($this->category)->title;
            }),
            Textarea::make(__('Описание'), 'description')->displayUsing(function($value) {
                return Str::limit($value, 600);
            }),
            Boolean::make(__('Популярная'), 'popular'),
            Boolean::make(__('Опубликована'), 'status'),
        ];
    }

    /**
     * Get the fields displayed by the resource.
     *
     * @param AdminRequest $request
     * @return array
     */
    public function creationFields(AdminRequest $request)
    {
        return [
            Text::make(__('Название'), 'title')->link($this->editPath())->rules('required'),
            Text::make(__('URL ID'), 'slug'),
            Select::make(__('Категория'), 'category_id')
                  ->options(
                      Select::prepare(\App\Models\Category::published()->get()->pluck('title', 'id'))
                  )->withEmpty(),
            Textarea::make(__('Описание'), 'description'),
            Editor::make(__('Текст'), 'text'),
            Boolean::make(__('Опубликована'), 'status')->default(true),
            Boolean::make(__('Популярная'), 'popular'),
        ];
    }

    /**
     * Get the fields displayed by the resource.
     *
     * @param AdminRequest $request
     * @return array
     */
    public function detailFields(AdminRequest $request)
    {
        return [
            Text::make(__('Название'), 'title')->link($this->editPath())->rules('required'),
            Text::make(__('URL ID'), 'slug'),
            Select::make(__('Категория'), 'category_id')
                  ->options(
                      Select::prepare(\App\Models\Category::published()->get()->pluck('title', 'id'))
                  )->withEmpty(),
            Textarea::make(__('Описание'), 'description'),
            Editor::make(__('Текст'), 'text'),
            Boolean::make(__('Опубликована'), 'status')->default(true),
            Boolean::make(__('Популярная'), 'popular'),

            new Metadata(),
            new Images(),
        ];
    }

    public function actions(Request $request)
    {
        return [
            new Publish(),
            new Hide(),
        ];
    }

    public function filters(Request $request)
    {
        return [
            new OnPage(20),
            new Status(),
        ];
    }
}
