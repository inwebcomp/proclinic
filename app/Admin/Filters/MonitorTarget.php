<?php

namespace App\Admin\Filters;

use App\Admin\Resources\ActivityMonitor;
use Illuminate\Http\Request;
use InWeb\Admin\App\Filters\Filter;

class MonitorTarget extends Filter
{
    public function name()
    {
        return __('Тип объекта');
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
        if ($value)
            $query->where('target_type', '=', $value);

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
        return array_flip(ActivityMonitor::$targetsMap);
    }
}