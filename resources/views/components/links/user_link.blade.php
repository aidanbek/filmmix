@include('components.links.template', [
    'route' => route('users.show', $user->id),
    'title' => $user->title
])
