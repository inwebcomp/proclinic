<?php


namespace App\Admin\Actions;

use App\Models\Product;
use App\Models\Provider;
use Carbon\Carbon;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Collection;
use InWeb\Admin\App\Actions\Action;
use InWeb\Admin\App\Actions\ActionEvent;
use InWeb\Admin\App\Fields\ActionFields;
use InWeb\Admin\App\Fields\Date;
use InWeb\Admin\App\Fields\Select;
use InWeb\Admin\App\Models\AdminUser;

class CalculateActivityTime extends Action
{
    use SerializesModels;

    public $onlyOnIndex = true;
    public $availableForEntireResource = true;
    public $timeout = 3600;
    public $tries = 1;
    public $withoutActionEvents = true;

    public function icon()
    {
        return 'fas fa-calculator';
    }

    public function name()
    {
        return __('Посчитать время работы');
    }

    /**
     * Perform the action on the given models.
     *
     * @param ActionFields                   $fields
     * @return mixed
     * @throws \Exception
     */
    public function handle(ActionFields $fields)
    {
        $query = ActionEvent::query();

        // Action
//        $query->where(function ($q) {
//            $q->orWhere('changes', 'like', '%"state": "' . \App\Models\Product::STATE_ACTIVE . '"%');
//            $q->orWhere(function ($q2) {
//                $q2->where('fields', 'like', '%"state";s:1:"' . \App\Models\Product::STATE_ACTIVE . '"%');
//                $q2->where('name', '=', 'Установить статус');
//            });
//        });

        // User
        $query->where('user_id', (int) $fields->user);

        // Date
        $query->whereBetween(\DB::raw('DATE(created_at)'), [Carbon::make($fields->date_from)->toDateString(), Carbon::make($fields->date_to)->toDateString()]);

        $query->orderBy('created_at');

        $data = $query->get();

        $result = 0;
        $interval = 0;
        $targetWas = null;

        if (! $data->count())
            return Action::message(__("Работы не было"));

        $targetWas = $data[0]->target_id;

        /** @var Carbon $time */
        $time = $data[0]->created_at;

        foreach ($data as $value) {
//            if ($value->target_id != $targetWas) {
////                $result += $interval;
////                $interval = 0;
////
//                $targetWas = $value->target_id;
//
//                /** @var Carbon $time */
//                $time = $value->created_at;
//            }

            $passed = strtotime((string) $value->created_at) - strtotime((string) $time);

            /** @var Carbon $time */
            $time = $value->created_at;

            if ($passed < 0 or $passed > 20 * 60) { // Minutes
                continue;
            }

            $result += $passed;
        }

//        $result += $interval;

        if (! $result)
            return Action::message(__("Работы не было"));

        $hours = floor($result / 3600);
        $minutes = sprintf("%02d", floor(($result / 60) % 60));
        $seconds = sprintf("%02d", $result % 60);


        $result = "$hours:$minutes:$seconds";

        return Action::message(__("Время работы") . ': ' . $result);
    }

    /**
     * Get the fields available on the action.
     *
     * @return array
     */
    public function fields()
    {
        return [
            Date::make(__('Дата от'), 'date_from')->rules('required'),
            Date::make(__('Дата до'), 'date_to')->rules('required'),
            Select::make(__('Пользователь'), 'user')
                ->options(AdminUser::orderBy('login')->get()->map(function($value){
                    return [
                        'value' => $value->id,
                        'title' => $value->login,
                    ];
                })),
        ];
    }
}