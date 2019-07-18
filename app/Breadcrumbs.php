<?php

namespace App;

use App\Models\Article;
use App\Models\Category;
use App\Models\Page;
use App\Models\Service;
use InWeb\Base\Support\Route;

class Breadcrumbs
{
    public static function page(Page $page)
    {
        $path = [];

        $path[] = [
            'title' => $page->title,
            'link'  => $page->path()
        ];

        return $path;
    }

    public static function blog(Category $category = null)
    {
        $path = [];

        $path[] = [
            'title' => __('Блог'),
            'link'  => localized(Route::route('blog.index'))
        ];

        if ($category) {
            $path[] = [
                'title' => $category->title,
                'link'  => $category->path()
            ];
        }

        return $path;
    }

    public static function article(Article $article)
    {
        $path = static::blog($article->category);

        $path[] = [
            'title' => $article->title,
            'link'  => $article->path()
        ];

        return $path;
    }

    public static function service(Service $service)
    {
        $path = [];

        $service->getAncestors()->each(function($ancestor) use (&$path) {
            $path[] = [
                'title' => $ancestor->title,
                'link'  => $ancestor->path()
            ];
        });

        $path[] = [
            'title' => $service->title,
            'link'  => $service->path()
        ];

        return $path;
    }
}