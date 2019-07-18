<?php

namespace App\Admin\Resources;

use Admin\ResourceTools\Images\Images;
use App\Admin\Actions\Hide;
use App\Admin\Actions\Publish;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use InWeb\Admin\App\Fields\Boolean;
use InWeb\Admin\App\Fields\Editor;
use InWeb\Admin\App\Fields\Text;
use InWeb\Admin\App\Fields\Textarea;
use InWeb\Admin\App\Http\Requests\AdminRequest;
use InWeb\Admin\App\Resources\Resource;

class Testimonial extends Resource
{
    public static $model = \App\Models\Testimonial::class;
    protected static $position = 5;

    public static $with = ['translations'];

    public static $search = [
        'name'
    ];

    public function title()
    {
        return $this->name;
    }

    public static function label()
    {
        return __('Отзывы');
    }

    public static function singularLabel()
    {
        return __('Отзыв');
    }

    public static function uriKey()
    {
        return 'testimonial';
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
            Text::make(__('Имя'), 'name')->link($this->editPath()),
            Textarea::make(__('Текст'), 'text')->displayUsing(function($value) {
                return Str::limit(strip_tags($value), 600);
            }),
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
            Text::make(__('Имя'), 'name')->link($this->editPath()),
            Editor::make(__('Текст'), 'text')->original(),
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
            Text::make(__('Имя'), 'name')->link($this->editPath()),
            Editor::make(__('Текст'), 'text')->original(),
            Boolean::make(__('Опубликован'), 'status'),
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
