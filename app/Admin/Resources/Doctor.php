<?php

namespace App\Admin\Resources;

use Admin\Fields\FeaturesField\Features;
use Admin\ResourceTools\Images\Images;
use Admin\ResourceTools\Metadata\Metadata;
use App\Admin\Actions\Hide;
use App\Admin\Actions\Publish;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use InWeb\Admin\App\Fields\Boolean;
use InWeb\Admin\App\Fields\Editor;
use InWeb\Admin\App\Fields\Text;
use InWeb\Admin\App\Fields\Textarea;
use InWeb\Admin\App\Http\Requests\AdminRequest;
use InWeb\Admin\App\Panel;
use InWeb\Admin\App\Resources\Resource;

class Doctor extends Resource
{
    public static $model = \App\Models\Doctor::class;
    protected static $position = 6;

    public static $with = ['translations'];

    public static $globallySearchable = true;

    public static $search = [
        'name'
    ];

    public function title()
    {
        return $this->name;
    }

    public static function label()
    {
        return __('Доктора');
    }

    public static function singularLabel()
    {
        return __('Доктор');
    }

    public static function uriKey()
    {
        return 'doctor';
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
            Text::make(__('URL ID'), 'slug'),
            Textarea::make(__('Описание'), 'description')->displayUsing(function($value) {
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
            Text::make(__('Имя'), 'name')->rules('required'),
            Text::make(__('URL ID'), 'slug'),
            Text::make(__('Специализация'), 'specialization')->original()->size('full'),
            Textarea::make(__('Описание'), 'description')->original(),
            Textarea::make(__('Цитата'), 'quote')->original(),
            Editor::make(__('Текст'), 'text'),
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
            Text::make(__('Имя'), 'name')->rules('required'),
            Text::make(__('URL ID'), 'slug'),
            Text::make(__('Специализация'), 'specialization')->original()->size('full'),
            Textarea::make(__('Описание'), 'description')->original(),
            Textarea::make(__('Цитата'), 'quote')->original(),
            Editor::make(__('Текст'), 'text'),
            Boolean::make(__('Опубликован'), 'status'),

            new Panel(__('Достижения'), [
                Features::make(__('Достижения'), 'features')->original(false)->size('full'),
            ]),

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
}
