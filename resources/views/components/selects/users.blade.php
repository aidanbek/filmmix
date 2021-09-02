@include('components.selects.template', [
    'label' => 'Личности',
    'name' => 'users',
    'current' => $currentUsers ?? [],
    'elements' => $users,
    'id' => 'id',
    'title' => 'title'
])

