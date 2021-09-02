@if($user->isActor())
    @include('components.actor_link', ['actor' => $user])
@else
    @include('components.director_link', ['director' => $user])
@endif

