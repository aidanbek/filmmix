@include('components.links.template', [
    'route' => route('professions.show', $profession->id),
    'title' => $profession->title
])
