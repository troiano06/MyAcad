<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" href="{{ url('css/favicon.jpg') }}">
        <title>@yield('title')</title>

        <!--Fonte do Google-->
        <!--<link rel="preconnect" href="https://fonts.googleapis.com">-->
        <!--<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>-->
        <link href="https://fonts.googleapis.com/css2?family=Roboto" rel="stylesheet">

        <!--CSS Bootstrap-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

        <!-- JavaScript Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

        <!--CSS da Aplicação-->
        <link rel="stylesheet" href="/css/styles.css">
        <script src="/js/scripts.js"></script>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <div class="dropdown">
                    <a href="#" class="dropdown" data-toggle="dropdown" data-bs-toggle="dropdown" aria-expanded="false">
                        <ion-icon class="menu" name="menu-outline"></ion-icon>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                      <li><a class="dropdown-item" href="/perfil/{{ auth()->user()->id }}">Perfil</a></li>
                      <li><a class="dropdown-item" href="#">Notificações</a></li>
                      <li><a class="dropdown-item" href="/regras">Regras</a></li>
                      <li><a class="dropdown-item" href="/"><img src="/img/myacad_logo.png" alt="MyAcad" id="logo"></a></li>
                      <li>
                          <form action="/logout" method="POST">
                            @csrf
                            <a class="dropdown-item"
                             href="/logout"
                             onclick="event.preventDefault();
                                      this.closest('form').submit();">
                                Sair
                            </a>
                        </form>
                      </li>
                    </ul>
                </div>
                <a class="navbar-brand" href="/calouros"><img src="/img/calouros_logo.png" alt="MyAcad" id="logo"></a>

            </div>
        </nav>
        <nav class="navbar justify-content-center navbar-expand-lg navbar-light bg-light nav fill">
            <div class="container-fluid justify-content-center nav-fill">
                <ul class="navbar-nav justify-content-center me-auto mb-2 mb-lg-0">
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/calouros">Recepção</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="/calouros/sobre">Sobre a Fatec</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="/calouros/depoimentos">Veteranos</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="/calouros/republicas">Repúblicas</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="/calouros/grupos">Grupos</a>
                  </li>
                </ul>
                <form class="d-flex" action="/" action="GET">
                    <input class="form-control me-2" type="search" id="search" name="search" placeholder="Procurando algo?" aria-label="Search">
                    <button class="btn btn-outline-dark" type="submit">Pesquisar</button>
                </form>
            </div>
        </nav>

        <main>
            <div class="container-fluid">
                <div class="row">
                    @if (session('msg'))
                        <p class="msg">{{ session('msg') }}</p>
                    @endif
                    @yield('content')
                </div>
            </div>
        </main>
        <footer>
            <p>MyAcad &copy; 2021</p>
        </footer>
        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    </body>
</html>
