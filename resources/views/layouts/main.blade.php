<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" type="image/x-icon" href="/img/favicon.png"/>
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
        @livewireStyles
    </head>
    <body>


        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <div class="dropdown">
                    <a href="#" class="dropdown" data-toggle="dropdown" data-bs-toggle="dropdown" aria-expanded="false">
                        </ion-icon><ion-icon class="menu" name="apps-sharp"></ion-icon>
                    </a>
                    <ul class="dropdown-menu" id="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                      <li><a class="dropdown-item" href="/perfil/{{ auth()->user()->id }}"><ion-icon name="person-sharp"></ion-icon> Perfil</a></li>
                      @if (auth()->user()->profile_type == 'Moderador')
                        <li><a class="dropdown-item" href="/notificacoes"><ion-icon name="at-circle-sharp"></ion-icon> Moderação</a></li>
                      @endif
                      <li><a class="dropdown-item" href="/regras"><ion-icon name="alert-circle-sharp"></ion-icon> Regras</a></li>
                      <li><a class="dropdown-item" href="/calouros"><img src="/img/calouros_logo.png" alt="MyAcad" id="logo"></a></li>
                      <li>
                          <form action="/logout" method="POST">
                            @csrf
                            <a class="dropdown-item"
                             href="/logout"
                             onclick="event.preventDefault();
                                      this.closest('form').submit();">
                                <ion-icon name="power-sharp"></ion-icon> Sair
                            </a>
                        </form>
                      </li>
                    </ul>
                </div>
                <img style="height: 60px;" src="/img/Fatec-sorocaba.png" alt="FatecLogo" id="FatecLogo">
                <a class="navbar-brand" href="/"><img src="/img/myacad_logo.png" alt="MyAcad" id="logo"></a>

            </div>
        </nav>
        <nav class="navbar justify-content-center navbar-expand-lg navbar-light bg-light nav fill">
            <div class="container-fluid">
                <button style="width: 40%; height: 50px; border: 2px solid #7e7e7e;" class="navbar-toggler container-fluid justify-content-center" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                    <ion-icon class="menu-collapse" name="menu-sharp"></ion-icon>
                  </button>
                <div class="collapse navbar-collapse container-fluid justify-content-center nav-fill" id="navbarTogglerDemo01" >
                    <ul class="navbar-nav justify-content-center me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/"><ion-icon name="home-sharp"></ion-icon> Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/categoria/geral"><ion-icon name="leaf-sharp"></ion-icon> Geral</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/categoria/comunicado"><ion-icon name="megaphone-sharp"></ion-icon> Comunicados</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/categoria/evento"><ion-icon name="calendar-number-sharp"></ion-icon> Eventos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/categoria/vaga"><ion-icon name="newspaper-sharp"></ion-icon> Vagas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/categoria/artigo"><ion-icon name="receipt-sharp"></ion-icon> Artigos</a>
                    </li>
                    <li class="nav-item">
                        <form class="d-flex" action="/" action="GET" id="search">
                            <input class="form-control me-2" type="search" id="search" name="search" placeholder="Procurando algo?" aria-label="Search">
                            <button class="btn btn-outline-dark" type="submit">Pesquisar</button>
                        </form>
                    </li>
                    </ul>
                </div>
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

    @livewireScripts
    </body>
</html>
