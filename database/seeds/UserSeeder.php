<?php

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $path = __DIR__ . "\\json\\users.json";
        $rawUsers = json_decode(file_get_contents($path), true);

        foreach ($rawUsers as $rawUser) {
            $user = User::create([
                'id' => $rawUser['id'],
                'title' => $rawUser['title']
            ]);

            $user->professions()->sync($rawUser['profession_ids']);
        }
    }
}
