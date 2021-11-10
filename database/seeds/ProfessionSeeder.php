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
            [
                'id' => 0,
                'title' => 'Актер',
                'plural_title' => 'Актеры'
            ],
            [
                'id' => 1,
                'title' => 'Композитор',
                'plural_title' => 'Композиторы'
            ],
            [
                'id' => 2,
                'title' => 'Оператор-постановщик',
                'plural_title' => 'Операторы-постановщики'
            ],
            [
                'id' => 3,
                'title' => 'Продюсер',
                'plural_title' => 'Продюсеры'
            ],
            [
                'id' => 4,
                'title' => 'Режиссер',
                'plural_title' => 'Режиссеры'
            ],
            [
                'id' => 5,
                'title' => 'Сценарист',
                'plural_title' => 'Сценаристы'
            ]
        ];

        foreach ($professions as $profession) {
            Profession::create([
                'id' => $profession['id'],
                'title' => $profession['title'],
                'plural_title' => $profession['plural_title']
            ]);
        }
    }
}
