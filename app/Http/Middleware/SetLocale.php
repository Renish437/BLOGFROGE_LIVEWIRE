<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class SetLocale
{
    public function handle(Request $request, Closure $next): Response
    {
      
      
        if (session()->has('locale') && array_key_exists(session()->get('locale'), config('app.supported_locales'))) {
            app()->setLocale(session('locale'));
            info('Locale successfully set to: ' . app()->getLocale());
        }
        return $next($request);
    }
}