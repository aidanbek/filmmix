<?php

namespace App\Providers;

use App\Actor;
use App\Director;
use App\Film;
use App\Genre;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    public function boot()
    {
        View::composer('*', function ($view) {
            $navbarLinkGroups = [
                'Фильмы' => [
                    'matcher' => 'films*',
                    'count' => Film::count(),
                    'links' => [
                        [
                            'title' => 'Добавить',
                            'route' => 'films.create'
                        ],
                        [
                            'title' => 'Список',
                            'route' => 'films.index'
                        ]
                    ]
                ],

                'Актеры' => [
                    'matcher' => 'actors*',
                    'count' => Actor::count(),
                    'links' => [
                        [
                            'title' => 'Добавить',
                            'route' => 'actors.create'
                        ],
                        [
                            'title' => 'Список',
                            'route' => 'actors.index'
                        ]
                    ]
                ],

                'Режиссеры' => [
                    'matcher' => 'directors*',
                    'count' => Director::count(),
                    'links' => [
                        [
                            'title' => 'Добавить',
                            'route' => 'directors.create'
                        ],
                        [
                            'title' => 'Список',
                            'route' => 'directors.index'
                        ]
                    ]
                ],

                'Жанры' => [
                    'matcher' => 'genres*',
                    'count' => Genre::count(),
                    'links' => [
                        [
                            'title' => 'Добавить',
                            'route' => 'genres.create'
                        ],
                        [
                            'title' => 'Список',
                            'route' => 'genres.index'
                        ]
                    ]
                ],

                'Импорт' => [
                    'matcher' => 'imports*',
                    'count' => null,
                    'links' => [
                        [
                            'title' => 'Импорт',
                            'route' => 'imports.index'
                        ]
                    ]
                ],

            ];
            $view->with('navbarLinkGroups', $navbarLinkGroups);
        });
    }
}
