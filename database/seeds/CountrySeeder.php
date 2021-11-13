<?php

use App\Models\Country;
use Illuminate\Database\Seeder;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $path = __DIR__ . "\\json\\countries.json";
        $rawCountries = json_decode(file_get_contents($path), true);

        foreach ($rawCountries as $rawCountry) {
            Country::create([
                'id' => $rawCountry['id'],
                'title' => $rawCountry['title']
            ]);
        }
    }
}
