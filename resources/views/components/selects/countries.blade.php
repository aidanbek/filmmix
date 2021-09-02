@include('components.selects.template', [
    'label' => 'Страны',
    'name' => 'countries',
    'current' => $currentCountries ?? [],
    'elements' => $countries,
    'id' => 'id',
    'title' => 'title'
])
