<?php

namespace App\Providers;

use App\Models\Country;
use App\Models\Film;
use App\Models\Genre;
use App\Models\Profession;
use App\Models\Tagline;
use App\Models\User;
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

                'Люди' => [
                    'matcher' => 'users*',
                    'count' => User::count(),
                    'links' => [
                        [
                            'title' => 'Добавить',
                            'route' => 'users.create',
                            'icon' => 'bi bi-person-plus'
                        ],
                        [
                            'title' => 'Список',
                            'route' => 'users.index',
                            'icon' => 'bi bi-card-list'
                        ]
                    ],
                    'icon' => 'bi bi-people'
                ],

                'Профессии' => [
                    'matcher' => 'professions*',
                    'count' => Profession::count(),
                    'links' => [
                        [
                            'title' => 'Добавить',
                            'route' => 'professions.create',
                            'icon' => 'bi bi-file-earmark-plus'
                        ],
                        [
                            'title' => 'Список',
                            'route' => 'professions.index',
                            'icon' => 'bi bi-file-earmark-person'
                        ]
                    ],
                    'icon' => 'bi bi-file-earmark-person'
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

                'Слоганы' => [
                    'matcher' => 'taglines*',
                    'count' => Tagline::count(),
                    'links' => [
                        [
                            'title' => 'Добавить',
                            'route' => 'taglines.create',
                            'icon' => 'bi bi-tag'
                        ],
                        [
                            'title' => 'Список',
                            'route' => 'taglines.index',
                            'icon' => 'bi bi-tags'
                        ]
                    ],
                    'icon' => 'bi bi-tags'
                ],
            ];
            $view->with('navbarLinkGroups', $navbarLinkGroups);
        });
    }
}
