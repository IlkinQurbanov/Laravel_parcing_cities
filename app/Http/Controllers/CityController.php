<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function index()
    {
        $cities = City::paginate(15); // Пагинация с 15 городами на страницу
        return view('home', compact('cities'));
    }

    public function showCity($city)
    {
        $selectedCity = City::where('slug', $city)->firstOrFail();
        $cities = City::paginate(15); // Пагинация с 15 городами на страницу
        return view('city', compact('cities', 'selectedCity'));
    }

    public function about($city)
    {
        $selectedCity = City::where('slug', $city)->firstOrFail();
        $cities = City::paginate(15); // Пагинация с 15 городами на страницу
        return view('about', compact('cities', 'selectedCity'));
    }

    public function news($city)
    {
        $selectedCity = City::where('slug', $city)->firstOrFail();
        $cities = City::paginate(15); // Пагинация с 15 городами на страницу
        return view('news', compact('cities', 'selectedCity'));
    }
}
