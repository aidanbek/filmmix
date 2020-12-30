<nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-3">
    <div class="container">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle"
                       href="#"
                       id="navbarDropdown"
                       role="button"
                       data-toggle="dropdown"
                       aria-haspopup="true"
                       aria-expanded="false">
                        Фильмы <span class="badge badge-info">{{\App\Film::count()}}</span>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{route('films.create')}}">Добавить</a>
                        <a class="dropdown-item" href="{{route('films.index')}}">Список</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle"
                       href="#"
                       id="navbarDropdown"
                       role="button"
                       data-toggle="dropdown"
                       aria-haspopup="true"
                       aria-expanded="false">
                        Актеры <span class="badge badge-info">{{\App\Actor::count()}}</span>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{route('actors.create')}}">Добавить</a>
                        <a class="dropdown-item" href="{{route('actors.index')}}">Список</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle"
                       href="#"
                       id="navbarDropdown"
                       role="button"
                       data-toggle="dropdown"
                       aria-haspopup="true"
                       aria-expanded="false">
                        Режиссеры <span class="badge badge-info">{{\App\Director::count()}}</span>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{route('directors.create')}}">Добавить</a>
                        <a class="dropdown-item" href="{{route('directors.index')}}">Список</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle"
                       href="#"
                       id="navbarDropdown"
                       role="button"
                       data-toggle="dropdown"
                       aria-haspopup="true"
                       aria-expanded="false">
                        Жанры <span class="badge badge-info">{{\App\Genre::count()}}</span>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{route('genres.create')}}">Добавить</a>
                        <a class="dropdown-item" href="{{route('genres.index')}}">Список</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link" href="{{route('imports.index')}}">Импорт</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
