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
use InWeb\Admin\App\Fields\Text;
use InWeb\Admin\App\Fields\Textarea;
use InWeb\Admin\App\Filters\OnPage;
use InWeb\Admin\App\Filters\Status;
use InWeb\Admin\App\Http\Requests\AdminRequest;
use InWeb\Admin\App\Resources\Resource;
use InWeb\Admin\App\ResourceTools\ActionsOnModel;

class Advantage extends Resource
{
    public static $model = \App\Models\Advantage::class;
    protected static $position = 2;

    public static $globallySearchable = true;

    public static $with = ['translations'];

    public static $search = [
        'title'
    ];

    public function title()
    {
        return $this->title;
    }

    public static function label()
    {
        return __('Преимущества');
    }

    public static function singularLabel()
    {
        return __('Преимущество');
    }

    public static function uriKey()
    {
        return 'advantage';
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
            Textarea::make(__('Описание'), 'description')->displayUsing(function($value) {
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
            Text::make(__('Название'), 'title')->link($this->editPath())->rules('required'),
            Editor::make(__('Описание'), 'description')->original()->rules('required'),
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
            Text::make(__('Название'), 'title')->link($this->editPath())->rules('required'),
            Editor::make(__('Описание'), 'description')->original()->rules('required'),
            Boolean::make(__('Опубликован'), 'status')->default(true),

            new Images(),
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
