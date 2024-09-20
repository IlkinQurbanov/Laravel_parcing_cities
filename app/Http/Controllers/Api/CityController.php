<?php

namespace App\Http\Controllers\Api;

use App\Models\City;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CityController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|unique:cities,name',
            'slug' => 'required|string|unique:cities,slug',
        ]);

        $city = City::create($request->all());

        return response()->json($city, 201);
    }

    public function destroy(City $city)
    {
        $city->delete();

        return response()->json(null, 204);
    }
}
