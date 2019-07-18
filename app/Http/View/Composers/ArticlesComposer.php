<?php

namespace App\Http\View\Composers;

use App\Models\Article;
use Illuminate\View\View;

class ArticlesComposer
{
    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $articles = Article::published()
            ->ordered()
            ->with('images')
            ->withTranslation()
            ->take(3)
            ->get();

        $view->with('articles', $articles);
    }
}