@include('components.links.template', [
    'route' => route('genres.show', $genre->id),
    'title' => $genre->title
])
