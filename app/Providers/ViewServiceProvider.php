<?php

namespace App\Providers;

use App\Http\View\Composers\AdvantagesComposer;
use App\Http\View\Composers\ArticlesComposer;
use App\Http\View\Composers\CategoryComposer;
use App\Http\View\Composers\ClinicComposer;
use App\Http\View\Composers\DoctorsComposer;
use App\Http\View\Composers\MenuComposer;
use App\Http\View\Composers\ServicesComposer;
use App\Http\View\Composers\TestimonialsComposer;
use App\Models\Page;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('*', function ($view) {
            $view->with('locale', App::getLocale());

            $indexPage = Page::whereTranslation('slug', 'index')->first();

            $data = $view->getData();

            if (! isset($data['meta']) or ! is_iterable($data['meta'])) {
                $view->with('meta', $indexPage ? $indexPage->metadata->toArray() : [
                    'title' => config('app.name')
                ]);
            }
        });

        View::composer('blocks.menu', MenuComposer::class);
        View::composer('blocks.services', ServicesComposer::class);
        View::composer('blocks.advantages', AdvantagesComposer::class);
        View::composer('blocks.dual-slider', ClinicComposer::class);
        View::composer('blocks.doctors-slider', DoctorsComposer::class);
        View::composer('blocks.clients-reviews', TestimonialsComposer::class);
        View::composer('blocks.index-articles', ArticlesComposer::class);
        View::composer('blog.categories', CategoryComposer::class);
    }
}