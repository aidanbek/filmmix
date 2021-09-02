@include('components.selects.template', [
    'label' => 'Жанры',
    'name' => 'genres',
    'current' => $currentGenres ?? [],
    'elements' => $genres,
    'id' => 'id',
    'title' => 'title'
])
