<?php

namespace App\Admin\Filters;

use Illuminate\Http\Request;
use InWeb\Admin\App\Filters\BooleanFilter;

class MonitorAction extends BooleanFilter
{
    public function name()
    {
        return __('Действие');
    }

    /**
     * Apply the filter to the given query.
     *
     * @param  \Illuminate\Http\Request              $request
     * @param  \Illuminate\Database\Eloquent\Builder $query
     * @param  mixed                                 $value
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function apply(Request $request, $query, $value)
    {
        $query->where(function ($q) use ($value) {
            if ($value['make-active']) {
                $q->orWhere('changes', 'like', '%"state": "' . \App\Models\Product::STATE_ACTIVE . '"%');
                $q->orWhere(function($q2) {
                    $q2->where('fields', 'like', '%"state";s:1:"' . \App\Models\Product::STATE_ACTIVE . '"%');
                    $q2->where('name', '=', 'Установить статус');
                });
            }
            if ($value['price'])
                $q->orWhere('name', '=', 'Обновить прайс');
            if ($value['create'])
                $q->orWhere('name', '=', 'Create');
            if ($value['update'])
                $q->orWhere('name', '=', 'Update');
        });

        return $query;
    }

    /**
     * Get the filter's available options.
     *
     * @param  \Illuminate\Http\Request $request
     * @return array
     */
    public function options(Request $request)
    {
        return [
            __('Сделать активным') => 'make-active',
            __('Обновление прайса') => 'price',
            __('Создание') => 'create',
            __('Изменение') => 'update'
        ];
    }
}