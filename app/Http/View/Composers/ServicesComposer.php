<?php

namespace App\Http\View\Composers;

use App\Models\Service;
use Illuminate\View\View;

class ServicesComposer
{
    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $services = Service::whereIsRoot()
            ->published()
            ->ordered()
            ->with('images')
            ->withTranslation()
            ->get();

        $view->with('services', $services);
    }
}