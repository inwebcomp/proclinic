<?php

namespace App;

use App\Models\Category;
use App\Models\Product;

class Breadcrumbs
{
    private static function root() {
        return [
            'title' => __('Главная'),
            'href' => '/'
        ];
    }

    public static function category(Category $category)
    {
        $path = [
            self::root()
        ];

        $category->ancestors()->each(function(Category $ancestor) use (&$path) {
            $path[] = [
                'title' => $ancestor->title,
                'href' => $ancestor->path()
            ];
        });

        $path[] = [
            'title' => $category->title,
            'href' => $category->path()
        ];

        return $path;
    }

    public static function product(Product $product)
    {
        $path = self::category($product->category);

        //$path[] = [
        //    'title' => $product->title,
        //    'href' => $product->path()
        //];

        return $path;
    }
}