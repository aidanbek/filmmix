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
        $professions = [
            ['title' => 'Актер'],
            ['title' => 'Композитор'],
            ['title' => 'Оператор-постановщик'],
            ['title' => 'Продюсер'],
            ['title' => 'Режиссер'],
            ['title' => 'Сценарист']
        ];

        foreach ($professions as $profession) {
            Profession::create([
                'title' => $profession['title']
            ]);
        }
    }
}
