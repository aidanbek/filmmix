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
        $genres = [
            [
                "id" => 0,
                "title" => "Аниме"
            ],
            [
                "id" => 1,
                "title" => "Биографический"
            ],
            [
                "id" => 2,
                "title" => "Боевик"
            ],
            [
                "id" => 3,
                "title" => "Вестерн"
            ],
            [
                "id" => 4,
                "title" => "Военный"
            ],
            [
                "id" => 5,
                "title" => "Детектив"
            ],
            [
                "id" => 6,
                "title" => "Детский"
            ],
            [
                "id" => 7,
                "title" => "Документальный"
            ],
            [
                "id" => 8,
                "title" => "Драма"
            ],
            [
                "id" => 9,
                "title" => "Исторический"
            ],
            [
                "id" => 10,
                "title" => "Кинокомикс"
            ],
            [
                "id" => 11,
                "title" => "Комедия"
            ],
            [
                "id" => 12,
                "title" => "Концерт"
            ],
            [
                "id" => 13,
                "title" => "Короткометражный"
            ],
            [
                "id" => 14,
                "title" => "Криминал"
            ],
            [
                "id" => 15,
                "title" => "Мелодрама"
            ],
            [
                "id" => 16,
                "title" => "Мистика"
            ],
            [
                "id" => 17,
                "title" => "Музыка"
            ],
            [
                "id" => 18,
                "title" => "Мультфильм"
            ],
            [
                "id" => 19,
                "title" => "Мюзикл"
            ],
            [
                "id" => 20,
                "title" => "Научный"
            ],
            [
                "id" => 21,
                "title" => "Нуар"
            ],
            [
                "id" => 22,
                "title" => "Приключения"
            ],
            [
                "id" => 23,
                "title" => "Реалити-шоу"
            ],
            [
                "id" => 24,
                "title" => "Семейный"
            ],
            [
                "id" => 25,
                "title" => "Спорт"
            ],
            [
                "id" => 26,
                "title" => "Ток-шоу"
            ],
            [
                "id" => 27,
                "title" => "Триллер"
            ],
            [
                "id" => 28,
                "title" => "Ужасы"
            ],
            [
                "id" => 29,
                "title" => "Фантастика"
            ],
            [
                "id" => 30,
                "title" => "Фэнтези"
            ],
            [
                "id" => 31,
                "title" => "Эротика"
            ],
        ];

        foreach ($genres as $genre) {
            Genre::create([
                'id' => $genre['id'],
                'title' => $genre['title']
            ]);
        }
    }
}
