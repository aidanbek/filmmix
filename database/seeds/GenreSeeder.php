<?php

use App\Models\Genre;
use Illuminate\Database\Seeder;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $path = __DIR__ . "\\json\\genres.json";
        $rawGenres = json_decode(file_get_contents($path), true);

        foreach ($rawGenres as $genre) {
            Genre::create([
                'id' => $genre['id'],
                'title' => $genre['title']
            ]);
        }
    }
}
