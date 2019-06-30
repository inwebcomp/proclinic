<?php

namespace App\Admin\Resources;

use Admin\ResourceTools\Images\Images;
use App\Admin\Actions\Hide;
use App\Admin\Actions\Publish;
use Illuminate\Http\Request;
use InWeb\Admin\App\Contracts\Nested;
use InWeb\Admin\App\Fields\Boolean;
use InWeb\Admin\App\Fields\FastActions;
use InWeb\Admin\App\Fields\Text;
use InWeb\Admin\App\Fields\TreeField;
use InWeb\Admin\App\Http\Requests\AdminRequest;
use InWeb\Admin\App\Resources\Resource;

class Navigation extends Resource implements Nested
{
    use \InWeb\Admin\App\Nested;

    protected static $position = 4;

    public static $model = \App\Models\Navigation::class;

    public static $with = ['translations'];

    public static function label()
    {
        return __('Меню');
    }

    public static function singularLabel()
    {
        return __('Меню');
    }

    public static function uriKey()
    {
        return 'navigation';
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
            Text::make(__('Ссылка'), 'link'),
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
            Text::make(__('Идентификатор'), 'uid'),
            Text::make(__('Ссылка'), 'link')->size('full')->original(),
            TreeField::make(__('Родитель'), 'parent_id'),
            Boolean::make('Опубликован', 'status'),
            new Images(),
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
            Text::make(__('Идентификатор'), 'uid'),
            Text::make(__('Ссылка'), 'link')->size('full')->original(),
            TreeField::make(__('Родитель'), 'parent_id'),
            Boolean::make('Опубликован', 'status'),
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
