<?php

namespace App\Providers;

use App\Models\Actor;
use App\Models\Country;
use App\Models\Director;
use App\Models\Film;
use App\Models\Genre;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    public function boot()
    {
        View::composer('layouts.default', function ($view) {
            $navbarLinkGroups = [
                'Фильмы' => [
                    'matcher' => 'films*',
                    'count' => Film::count(),
                    'links' => [
                        [
                            'title' => 'Добавить',
                            'route' => 'films.create',
                            'icon' => 'bi bi-plus-circle'
                        ],
                        [
                            'title' => 'Список',
                            'route' => 'films.index',
                            'icon' => 'bi bi-card-list'
                        ]
                    ],
                    'icon' => 'bi bi-film'
                ],

                'Актеры' => [
                    'matcher' => 'actors*',
                    'count' => Actor::count(),
                    'links' => [
                        [
                            'title' => 'Добавить',
                            'route' => 'actors.create',
                            'icon' => 'bi bi-person-plus'
                        ],
                        [
                            'title' => 'Список',
                            'route' => 'actors.index',
                            'icon' => 'bi bi-card-list'
                        ]
                    ],
                    'icon' => 'bi bi-people'
                ],

                'Режиссеры' => [
                    'matcher' => 'directors*',
                    'count' => Director::count(),
                    'links' => [
                        [
                            'title' => 'Добавить',
                            'route' => 'directors.create',
                            'icon' => 'bi bi-person-plus'
                        ],
                        [
                            'title' => 'Список',
                            'route' => 'directors.index',
                            'icon' => 'bi bi-card-list'
                        ]
                    ],
                    'icon' => 'bi bi-people'
                ],

                'Жанры' => [
                    'matcher' => 'genres*',
                    'count' => Genre::count(),
                    'links' => [
                        [
                            'title' => 'Добавить',
                            'route' => 'genres.create',
                            'icon' => 'bi bi-tag'
                        ],
                        [
                            'title' => 'Список',
                            'route' => 'genres.index',
                            'icon' => 'bi bi-card-list'
                        ]
                    ],
                    'icon' => 'bi bi-tags'
                ],

                'Страны' => [
                    'matcher' => 'countries*',
                    'count' => Country::count(),
                    'links' => [
                        [
                            'title' => 'Добавить',
                            'route' => 'countries.create',
                            'icon' => 'bi bi-flag'
                        ],
                        [
                            'title' => 'Список',
                            'route' => 'countries.index',
                            'icon' => 'bi bi-map'
                        ]
                    ],
                    'icon' => 'bi bi-flag'
                ],

                'Импорт' => [
                    'matcher' => 'imports*',
                    'count' => null,
                    'links' => [
                        [
                            'title' => 'Импорт',
                            'route' => 'imports.index'
                        ]
                    ],
                    'icon' => 'bi bi-cloud-upload'
                ],

            ];
            $view->with('navbarLinkGroups', $navbarLinkGroups);
        });
    }
}
