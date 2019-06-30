<?php

namespace App\Http\View\Composers;

use App\Models\Clinic;
use Illuminate\View\View;

class ClinicComposer
{
    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $clinic = Clinic::published()
            ->ordered()
            ->with('images')
            ->withTranslation()
            ->get();

        $view->with('clinic', $clinic);
    }
}