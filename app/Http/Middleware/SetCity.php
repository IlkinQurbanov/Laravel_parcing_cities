<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\City;
use Illuminate\Support\Facades\Session;


class SetCity
{
    public function handle($request, Closure $next)
    {
        $citySlug = $request->segment(1);
        $city = City::where('slug', $citySlug)->first();

        if ($city) {
            Session::put('selected_city', $city);
        } elseif (!Session::has('selected_city')) {
            // Если город не найден и город не установлен, перенаправить на главную
            return redirect()->route('home')->with('error', 'Пожалуйста, выберите город.');
        }

        return $next($request);
    }
}
