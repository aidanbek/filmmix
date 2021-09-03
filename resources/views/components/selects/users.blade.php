@include('components.selects.template', [
    'label' => 'Люди',
    'name' => 'users',
    'current' => $currentUsers ?? [],
    'elements' => $users,
    'id' => 'id',
    'title' => 'title'
])

