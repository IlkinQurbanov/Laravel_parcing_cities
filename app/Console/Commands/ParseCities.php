<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\City;
use Illuminate\Support\Facades\Http;

class ParseCities extends Command
{
    protected $signature = 'parse:cities';
    protected $description = 'Parse cities from hh.ru API and save to the database';

    public function handle()
    {
        $response = Http::get('https://api.hh.ru/areas');
        $areas = $response->json();

        foreach ($areas as $country) {
            if ($country['name'] === 'Россия') {
                foreach ($country['areas'] as $region) {
                    foreach ($region['areas'] as $city) {
                        City::updateOrCreate(
                            ['slug' => strtolower($city['name'])],
                            ['name' => $city['name']]
                        );
                    }
                }
            }
        }

        $this->info('Cities parsed and saved to the database.');
    }
}
