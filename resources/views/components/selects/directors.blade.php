@include('components.selects.template', [
    'label' => 'Режиссеры',
    'name' => 'directors',
    'current' => $currentDirectors ?? [],
    'elements' => $directors,
    'id' => 'id',
    'title' => 'title'
])

