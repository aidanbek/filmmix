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
                            'route' => 'films.create',
                            'icon' => 'plus-circle'
                        ],
                        [
                            'title' => 'Список',
                            'route' => 'films.index',
                            'icon' => 'card-list'
                        ]
                    ],
                    'icon' => 'film'
                ],

                'Актеры' => [
                    'matcher' => 'actors*',
                    'count' => Actor::count(),
                    'links' => [
                        [
                            'title' => 'Добавить',
                            'route' => 'actors.create',
                            'icon' => 'person-plus'
                        ],
                        [
                            'title' => 'Список',
                            'route' => 'actors.index',
                            'icon' => 'card-list'
                        ]
                    ],
                    'icon' => 'people'
                ],

                'Режиссеры' => [
                    'matcher' => 'directors*',
                    'count' => Director::count(),
                    'links' => [
                        [
                            'title' => 'Добавить',
                            'route' => 'directors.create',
                            'icon' => 'person-plus'
                        ],
                        [
                            'title' => 'Список',
                            'route' => 'directors.index',
                            'icon' => 'card-list'
                        ]
                    ],
                    'icon' => 'people'
                ],

                'Жанры' => [
                    'matcher' => 'genres*',
                    'count' => Genre::count(),
                    'links' => [
                        [
                            'title' => 'Добавить',
                            'route' => 'genres.create',
                            'icon' => 'tag'
                        ],
                        [
                            'title' => 'Список',
                            'route' => 'genres.index',
                            'icon' => 'card-list'
                        ]
                    ],
                    'icon' => 'tags'
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
                    'icon' => 'cloud-upload'
                ],

            ];
            $view->with('navbarLinkGroups', $navbarLinkGroups);
        });
    }
}
