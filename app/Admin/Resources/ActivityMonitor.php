<?php

namespace App\Admin\Resources;

use App\Admin\Actions\CalculateActivityTime;
use App\Admin\Filters\MonitorAction;
use App\Admin\Filters\MonitorTarget;
use Illuminate\Http\Request;
use InWeb\Admin\App\Actions\ActionEvent;
use InWeb\Admin\App\Admin;
use InWeb\Admin\App\Fields\Datetime;
use InWeb\Admin\App\Fields\Image;
use InWeb\Admin\App\Fields\Text;
use InWeb\Admin\App\Filters\CreatedAt;
use InWeb\Admin\App\Http\Requests\AdminRequest;
use InWeb\Admin\App\Resources\Resource;
use InWeb\Media\Images\WithImages;

class ActivityMonitor extends Resource
{
    public static $model = ActionEvent::class;
    protected static $position = 11;
    public static $with = ['target', 'user'];
    public static $globallySearchable = false;

    public static function label()
    {
        return __('Монитор активности');
    }

    public static function singularLabel()
    {
        return __('Информация');
    }

    public static function uriKey()
    {
        return 'activity-monitor';
    }

    public static function authorizedToCreate(AdminRequest $request)
    {
        return false;
    }

    public static function authorizeToCreate(Request $request)
    {
        return false;
    }

    public static function indexQuery(AdminRequest $request, $query)
    {
        return $query
            ->select('target_type', 'target_id', \DB::raw('MIN(created_at) as created_at'), 'user_id', 'name', \DB::raw('MIN(action_events.id) as id'))
            ->groupBy(['user_id', 'name', 'target_type', 'target_id'])
            ->orderBy(\DB::raw('created_at'), 'desc');
    }

    public static $targetsMap = [
        \App\Models\Category::class => 'Категория',
        \App\Models\Product::class  => 'Товар',
        \App\Models\Banner::class   => 'Баннер',
        \App\Models\Page::class     => 'Страница',
    ];

    public function defaultOrdering(Request $request)
    {
        return [];
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
            Text::make(__('Пользователь'), function () {
                return $this->user->login;
            }),
            Text::make(__('Объект'), function () {
                return self::$targetsMap[$this->target_type] ?? '';
            })->classes(['min-w-0', 'pr-8']),

            Image::make('')->preview(function () {
                /** @var WithImages $target */
                $target = $this->target;

                if (! $target or ! in_array(WithImages::class, class_uses_recursive($target)))
                    return false;

                $thumbnail = 'thumbnail';

                if (! $target->imageThumbnailExists($thumbnail))
                    $thumbnail = 'original';

                /** @var \InWeb\Media\Images\Image $image */
                $images = $target->images;
                return $images->map(function($image) use ($thumbnail) {
                    return optional($image)->getUrl($thumbnail);
                });
            })->many()->limit(3),

            Text::make('', 'target')->resolveUsing(function () {
                return optional($this->target)->title ?? '';
            })->link('/resource/' . static::uriKey() . '#edit/' . (Admin::resourceForModel($this->target_type))::uriKey() . '/' . optional($this->target)->getKey()),

            Datetime::make(__('Дата'), 'created_at'),
            Text::make(__('Действие'), 'name'),
        ];
    }

    public function actions(Request $request)
    {
        return [
            new CalculateActivityTime(),
        ];
    }

    public function filters(Request $request)
    {
        return [
            new MonitorTarget(),
            new MonitorAction(),
            new \App\Admin\Filters\AdminUser(),
            (new CreatedAt())->range(),
        ];
    }
}
