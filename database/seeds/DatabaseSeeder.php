<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this
            ->call(ProfessionSeeder::class)
            ->call(GenreSeeder::class)
            ->call(CountrySeeder::class)
            ->call(UserSeeder::class);
    }
}
