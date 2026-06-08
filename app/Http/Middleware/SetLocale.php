<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class SetLocale
{
    public function handle(Request $request, Closure $next)
    {
        $locale = $request->header('Accept-Language', config('app.locale'));
        $supported = ['en', 'ar'];
        $locale = in_array($locale, $supported) ? $locale : 'en';

        App::setLocale($locale);

        return $next($request);
    }
}