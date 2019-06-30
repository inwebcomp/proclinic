<?php

namespace App\Http\View\Composers;

use App\Models\Advantage;
use Illuminate\View\View;

class AdvantagesComposer
{
    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $advantages = Advantage::published()
            ->ordered()
            ->with('images')
            ->withTranslation()
            ->get();

        $view->with('advantages', $advantages);
    }
}