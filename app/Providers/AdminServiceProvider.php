<?php

namespace App\Providers;

use InWeb\Admin\App\Admin;
use InWeb\Admin\App\Providers\AdminApplicationServiceProvider;
use InWeb\Admin\TranslatablePhrases\TranslatablePhrases;
use Inweb\Tools\PermissionsTool\PermissionsTool;

class AdminServiceProvider extends AdminApplicationServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        Admin::setDefaultLocale('ru');
    }

    public function groups()
    {
        parent::groups();
    }

    /**
     * Get the cards that should be listed in the Nova sidebar.
     *
     * @return array
     */
    public function tools()
    {
        return [
            new TranslatablePhrases(),
            new PermissionsTool(),
        ];
    }
}
