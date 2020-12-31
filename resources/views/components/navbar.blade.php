<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-3">
    <div class="container">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                @foreach($navbarLinkGroups as $title => $group)
                    @if(count($group['links']) > 1)
                        <li class="nav-item dropdown @if(Request::is($group['matcher'])) active @endif">
                            <a class="nav-link dropdown-toggle"
                               href="#"
                               id="navbarDropdown"
                               role="button"
                               data-toggle="dropdown"
                               aria-haspopup="true"
                               aria-expanded="false">
                                <i class="bi bi-{{$group['icon']}}"></i>
                                {{$title}}
                                <span class="badge badge-secondary">{{$group['count']}}</span>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                @foreach($group['links'] as $link)
                                    <a class="dropdown-item" href="{{route($link['route'])}}">
                                        <i class="bi bi-{{$link['icon']}}"></i> {{$link['title']}}
                                    </a>
                                @endforeach
                            </div>
                        </li>
                    @else
                        <li class="nav-item dropdown @if(Request::is($group['matcher'])) active @endif">
                            <a class="nav-link" href="{{route($group['links'][0]['route'])}}">
                                <i class="bi bi-{{$group['icon']}}"></i> {{$group['links'][0]['title']}}
                            </a>
                        </li>
                    @endif
                @endforeach
            </ul>
        </div>
    </div>
</nav>
