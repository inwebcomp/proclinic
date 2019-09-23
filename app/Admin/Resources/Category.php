<?php

namespace App\Admin\Resources;

use Admin\ResourceTools\Metadata\Metadata;
use App\Admin\Actions\Hide;
use App\Admin\Actions\Publish;
use Illuminate\Http\Request;
use InWeb\Admin\App\Fields\Boolean;
use InWeb\Admin\App\Fields\Text;
use InWeb\Admin\App\Http\Requests\AdminRequest;
use InWeb\Admin\App\Resources\Resource;

class Category extends Resource
{
    public static $model = \App\Models\Category::class;
    protected static $position = 8;

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
        return __('Категории статей');
    }

    public static function singularLabel()
    {
        return __('Категория статей');
    }

    public static function uriKey()
    {
        return 'category';
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
            Boolean::make(__('Опубликован'), 'status'),
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
            Boolean::make(__('Опубликован'), 'status'),
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
            Boolean::make(__('Опубликован'), 'status'),

            new Metadata(),
        ];
    }

    public function actions(Request $request)
    {
        return [
            new Publish(),
            new Hide(),
        ];
    }
}
