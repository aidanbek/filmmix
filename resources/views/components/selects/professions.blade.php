@include('components.selects.template', [
    'label' => 'Профессии',
    'name' => 'professions',
    'current' => $currentProfessions ?? [],
    'elements' => $professions,
    'id' => 'id',
    'title' => 'title'
])

