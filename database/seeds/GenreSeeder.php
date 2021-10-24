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
            ['title' => 'Аниме'],
            ['title' => 'Биографический'],
            ['title' => 'Боевик'],
            ['title' => 'Вестерн'],
            ['title' => 'Военный'],
            ['title' => 'Детектив'],
            ['title' => 'Детский'],
            ['title' => 'Документальный'],
            ['title' => 'Драма'],
            ['title' => 'Исторический'],
            ['title' => 'Кинокомикс'],
            ['title' => 'Комедия'],
            ['title' => 'Концерт'],
            ['title' => 'Короткометражный'],
            ['title' => 'Криминал'],
            ['title' => 'Мелодрама'],
            ['title' => 'Мистика'],
            ['title' => 'Музыка'],
            ['title' => 'Мультфильм'],
            ['title' => 'Мюзикл'],
            ['title' => 'Научный'],
            ['title' => 'Нуар'],
            ['title' => 'Приключения'],
            ['title' => 'Реалити-шоу'],
            ['title' => 'Семейный'],
            ['title' => 'Спорт'],
            ['title' => 'Ток-шоу'],
            ['title' => 'Триллер'],
            ['title' => 'Ужасы'],
            ['title' => 'Фантастика'],
            ['title' => 'Фэнтези'],
            ['title' => 'Эротика']
        ];

        foreach ($genres as $genre) {
            Genre::create([
                'title' => $genre['title']
            ]);
        }
    }
}
