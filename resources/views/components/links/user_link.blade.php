@if($user->isActor())
    @include('components.links.actor_link', ['actor' => $user])
@else
    @include('components.links.director_link', ['director' => $user])
@endif

