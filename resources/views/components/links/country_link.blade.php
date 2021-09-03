@include('components.links.template', [
    'route' => route('countries.show', $country->id),
    'title' => $country->title
])
