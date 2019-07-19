<?php

namespace App\Http\View\Composers;

use App\Models\Service;
use App\Models\Testimonial;
use Illuminate\View\View;

class TestimonialsComposer
{
    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $testimonials = Testimonial::published()
            ->ordered('desc')
            ->get();

        $view->with('testimonials', $testimonials);
    }
}