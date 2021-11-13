<?php

use App\Models\Profession;
use Illuminate\Database\Seeder;

class ProfessionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $path = __DIR__ . "\\json\\professions.json";
        $rawProfessions = json_decode(file_get_contents($path), true);

        foreach ($rawProfessions as $profession) {
            Profession::create([
                'id' => $profession['id'],
                'title' => $profession['title'],
                'plural_title' => $profession['plural_title']
            ]);
        }
    }
}
