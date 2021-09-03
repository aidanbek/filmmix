@include('components.links.template', [
    'route' => route('films.show', $film->id),
    'title' => $film->title
])

