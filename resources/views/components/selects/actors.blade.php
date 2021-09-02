@include('components.selects.template', [
    'label' => 'Актеры',
    'name' => 'actors',
    'current' => $currentActors ?? [],
    'elements' => $actors,
    'id' => 'id',
    'title' => 'title'
])

