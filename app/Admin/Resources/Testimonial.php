<?php

namespace App\Admin\Resources;

use App\Admin\Actions\Hide;
use App\Admin\Actions\Publish;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use InWeb\Admin\App\Fields\Boolean;
use InWeb\Admin\App\Fields\Date;
use InWeb\Admin\App\Fields\Editor;
use InWeb\Admin\App\Fields\Text;
use InWeb\Admin\App\Fields\Textarea;
use InWeb\Admin\App\Filters\OnPage;
use InWeb\Admin\App\Filters\Status;
use InWeb\Admin\App\Http\Requests\AdminRequest;
use InWeb\Admin\App\Resources\Resource;
use InWeb\Admin\App\ResourceTools\ActionsOnModel;

class Testimonial extends Resource
{
    public static $model = \App\Models\Testimonial::class;
    protected static $position = 5;

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

    public static function notification()
    {
        return \App\Models\Testimonial::hidden()->count();
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
            Text::make(__('Имя'), 'name')->link($this->editPath())->rules('required'),
            Date::make(__('Дата'), 'created_at'),
            Editor::make(__('Текст'), 'text')->original()->rules('required'),
            Boolean::make(__('Опубликован'), 'status')->default(true),
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
            Text::make(__('Имя'), 'name')->link($this->editPath())->rules('required'),
            Date::make(__('Дата'), 'created_at'),
            Editor::make(__('Текст'), 'text')->original()->rules('required'),
            Boolean::make(__('Опубликован'), 'status')->default(true),

            new ActionsOnModel(),
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
