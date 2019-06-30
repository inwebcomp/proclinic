<?php

namespace App\Http\Middleware;

use Closure;

class ApiLanguage
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param Closure                   $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $language = $request->get('language');

        if ($language and in_array($language, ['ru', 'ro', 'en'])) {
            \App::setLocale($language);
        }

        $language = \App::getLocale();
        \Carbon\Carbon::setLocale($language);
        setlocale(LC_ALL, $language . '_' . strtoupper($language) . '.UTF-8', $language);

        return $next($request);
    }
}
