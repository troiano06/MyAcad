<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>@yield('title')</title>

        <!--Fonte do Google-->
        <!--<link rel="preconnect" href="https://fonts.googleapis.com">-->
        <!--<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>-->
        <link href="https://fonts.googleapis.com/css2?family=Roboto" rel="stylesheet">

        <!--CSS Bootstrap-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

        <!--CSS da Aplicação-->
        <link rel="stylesheet" href="/css/styles.css">
        <script src="/js/scripts.js"></script>

        <!--Testes-->
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
        <link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">

        <script type="text/javascript">
            $(document).ready(function() {
                $('dropdown-toggle').dropdown()
            });
        </script>
    </head>
    <body>
        <div class="myacad-header">
            <nav class="navbar navbar-expand-lg navbar-light col-16">
                <div class="navbar-collapse col" id="navbar-menu" >
                    <a href="#" class="dropdown" data-toggle="dropdown"><ion-icon class="menu" name="menu-outline"></ion-icon></a>
                    <ul class="dropdown-menu" role="menu">
                        <li class="menu-item"><a href="#"><ion-icon class="menu-icon" name="person-outline"></ion-icon> Perfil </a></li>
                        <li class="divider"></li>
                        <li class="menu-item"><a href="#"><ion-icon class="menu-icon" name="alert-circle-outline"></ion-icon> Notificações </a></li>
                        <li class="divider"></li>
                        <li class="menu-item"><a href="/rules"><ion-icon class="menu-icon" name="shield-checkmark-outline"></ion-icon> Regras </a></li>
                    </ul>
                </div>
                <div class="navbar-collapse col" id="navbar-icon" >
                    <a href="/" class="navbar-brand">
                        <img src="/img/myacad_logo.png" alt="MyAcad" id="logo">
                    </a>
                </div>
                <div class="collapse navbar-collapse col-12" id="navbar-category" >
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="/calouros" class="nav-link">Recepção</a>
                        </li>
                        <li class="nav-item">
                            <a href="/calouros/sobre" class="nav-link">Sobre a Fatec</a>
                        </li>
                        <li class="nav-item">
                            <a href="/calouros/posts" class="nav-link">Veteranos</a>
                        </li>
                        <li class="nav-item">
                            <a href="/calouros/posts" class="nav-link">Repúblicas</a>
                        </li>
                        <li class="nav-item">
                            <a href="/calouros/grupos" class="nav-link">Grupos</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
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
