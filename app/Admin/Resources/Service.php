<?php

namespace App\Admin\Resources;

use Admin\ResourceTools\Images\Images;
use Admin\ResourceTools\Metadata\Metadata;
use App\Admin\Actions\Hide;
use App\Admin\Actions\Publish;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use InWeb\Admin\App\Contracts\Nested;
use InWeb\Admin\App\Fields\Boolean;
use InWeb\Admin\App\Fields\Editor;
use InWeb\Admin\App\Fields\FastActions;
use InWeb\Admin\App\Fields\Text;
use InWeb\Admin\App\Fields\Textarea;
use InWeb\Admin\App\Fields\TreeField;
use InWeb\Admin\App\Http\Requests\AdminRequest;
use InWeb\Admin\App\Resources\Resource;

class Service extends Resource implements Nested
{
    use \InWeb\Admin\App\Nested;

    public static $model = \App\Models\Service::class;
    protected static $position = 1;

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
        return __('Услуги');
    }

    public static function singularLabel()
    {
        return __('Услуга');
    }

    public static function uriKey()
    {
        return 'service';
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
            TreeField::make(__('Название'), 'title'),
            FastActions::make('')->onlyOnHover()->edit($this->editPath()),
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
            Text::make(__('Название'), 'title')->link($this->editPath())->rules('required'),
            Text::make(__('URL ID'), 'slug'),
            TreeField::make(__('Родитель'), 'parent_id'),
            Editor::make(__('Описание'), 'description')->original(),
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
            Text::make(__('Название'), 'title')->link($this->editPath())->rules('required'),
            Text::make(__('URL ID'), 'slug'),
            TreeField::make(__('Родитель'), 'parent_id'),
            Editor::make(__('Описание'), 'description')->original(),
            Editor::make(__('Текст'), 'text'),
            Boolean::make(__('Опубликован'), 'status'),

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
