@include('components.selects.template', [
    'label' => 'Фильмы',
    'name' => 'films',
    'current' => $currentFilms ?? [],
    'elements' => $films,
    'id' => 'id',
    'title' => 'title'
])
