@include('components.links.template', [
    'route' => route('taglines.show', $tagline->id),
    'title' => $tagline->text
])
