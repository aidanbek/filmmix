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
                'title' => 'Актер',
                'plural_title' => 'Актеры'
            ],
            [
                'title' => 'Композитор',
                'plural_title' => 'Композиторы'
            ],
            [
                'title' => 'Оператор-постановщик',
                'plural_title' => 'Операторы-постановщики'
            ],
            [
                'title' => 'Продюсер',
                'plural_title' => 'Продюсеры'
            ],
            [
                'title' => 'Режиссер',
                'plural_title' => 'Режиссеры'
            ],
            [
                'title' => 'Сценарист',
                'plural_title' => 'Сценаристы'
            ]
        ];

        foreach ($professions as $profession) {
            Profession::create([
                'title' => $profession['title'],
                'plural_title' => $profession['plural_title']
            ]);
        }
    }
}
