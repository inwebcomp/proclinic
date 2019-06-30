<?php

namespace App\Http\View\Composers;

use App\Models\Doctor;
use Illuminate\View\View;

class DoctorsComposer
{
    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $doctors = Doctor::published()
            ->ordered()
            ->with('images')
            ->withTranslation()
            ->get();

        $view->with('doctors', $doctors);
    }
}