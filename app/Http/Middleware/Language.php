<?php

namespace App\Http\Middleware;

use Closure;

class Language
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
        $language = $request->route()->parameter('locale');

        if ($language and in_array($language, ['ro', 'en'])) {
            \App::setLocale($language);
        } else if ($language == 'ru') {
            return abort(404);
        }

        $language = \App::getLocale();
        \Carbon\Carbon::setLocale($language);
        setlocale(LC_ALL, $language . '_' . strtoupper($language) . '.UTF-8', $language);

        return $next($request);
    }
}
