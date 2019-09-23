<?php

namespace App\Http\Controllers;

use App\Breadcrumbs;
use App\Models\Article;
use App\Models\Category;
use App\Models\Page;

class BlogController extends Controller
{
    public function index($category = null)
    {
        if ($category)
            $category = Category::findBySlug($category)->firstOrFail();

        $articles = Article::published()
                           ->ordered('desc')
                           ->with('images')
                           ->withTranslation()
                           ->paginate(10);

        $popularArticles = Article::published()
                                  ->popular()
                                  ->ordered('desc')
                                  ->with('images')
                                  ->withTranslation()
                                  ->get();

        $blogPage = Page::whereTranslation('slug', 'blog')->first();

        $metadata = null;

        if ($category) {
            $metadata = optional($category->metadata)->toArray();

            $metadata = array_merge([
                'title' => $category->title,
            ], $metadata ?? []);
        }

        if ($blogPage and ! $metadata) {
            $metadata = optional(optional($blogPage)->metadata)->toArray();
        }

        return view('pages.blog', [
            'articles'        => $articles,
            'popularArticles' => $popularArticles,
            'category'        => $category,
            'breadcrumbs'     => Breadcrumbs::blog($category),
            'pageTitle'       => $category ? $category->title : __('Блог клиники'),
            'meta'            => $metadata,
        ]);
    }

    public function show($article)
    {
        $article = Article::findBySlug($article)->firstOrFail();

        return view('pages.blog-show', [
            'article'     => $article,
            'breadcrumbs' => Breadcrumbs::article($article),
            'pageTitle'   => $article->title,
            'meta'        => array_merge([
                'title'       => $article->title,
                'description' => $article->description,
            ], optional($article->metadata)->toArray() ?? []),
        ]);
    }
}
