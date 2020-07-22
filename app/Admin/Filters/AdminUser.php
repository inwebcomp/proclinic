<?php

namespace App\Admin\Filters;

use Illuminate\Http\Request;
use InWeb\Admin\App\Filters\Filter;

class AdminUser extends Filter
{
    public $search = true;
    public $customList = null;

    public function name()
    {
        return __('Пользователь');
    }

    public function customList($customList)
    {
        $this->customList = $customList;

        return $this;
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
            $query->where('user_id', (int) $value);

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
        $data = [];

        if ($this->customList)
            $users = $this->customList;
        else
            $users = \InWeb\Admin\App\Models\AdminUser::orderBy('login')->get();

        foreach ($users as $user)
            $data[$user->login] = $user->id;

        return $data;
    }
}