<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Styles -->
        <link rel="icon" href="img/favicon.jpg" type="image/jpg">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Lato:wght@100;300;400;700&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Lato:wght@100;300;400;700&family=Roboto:wght@100;300;400&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="css/styles.css">
    </head>
    <body>
        <header class="bg-danger fixed-top">


        <nav class="navbar navbar-expand-lg navbar-light bg-white">
            <div class="container">
                 <a class="navbar-brand" href="#">
                    <img src="img/english-point-logo.jpg" alt="English Point Logo" width="50" height="auto">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="nav ms-auto mb-2 mb-lg-0 d-lg-flex d-block">
                        <li class="nav-item">
                            <a class="nav-link" href="#acerca-de-nosotros">Acerca de nosotros</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#servicios">Servicios</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#testimonios">Testimonios</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#contactanos">Contáctanos</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>


        <nav class="navbar navbar-light bg-white d-none">
            <div class="container">
                <a class="navbar-brand" href="#">
                    <img src="img/english-point-logo.jpg" alt="English Point Logo" width="50" height="auto">
                </a>
                <ul class="nav justify-content-end">
                    <li class="nav-item">
                        <a class="nav-link" href="#acerca-de-nosotros">Acerca de nosotros</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#servicios">Servicios</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#testimonios">Testimonios</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contactanos">Contáctanos</a>
                    </li>
                </ul>
            </div>
        </nav>
        </header>

        @yield('content')

        <footer class="dark-blue-bg">
            <div class="container">
                <div class="row py-5">
                    <div class="col-md-3">
                        <h4 class="text-center text-white text-white mb-4">Contáctanos</h4>
                        <p class="text-white text-center fw-bold mb-3">Teléfono:<br /><a class="text-white fw-light" href="tel:7777-7777">7777-7777</a></p>
                        <p class="text-white text-center fw-bold">Correo:<br /><a class="text-white fw-light" href="mailto:correo@correo.com">correo@correo.com</a></p>
                    </div>
                    <div class="col-md-3">
                        <h4 class="text-center text-white mb-4">Cursos</h4>
                        <p class="text-center"><a class="text-white fw-light" href="#">Básico</a></p>
                        <p class="text-center"><a class="text-white fw-light" href="#">Intermedio</a></p>
                        <p class="text-center"><a class="text-white fw-light" href="#">Avanzado</a></p>
                    </div>
                    <div class="col-md-3">
                        <h4 class="text-center text-white mb-4">Refuerzo</h4>
                        <p class="text-center"><a class="text-white fw-light" href="#">Básico</a></p>
                        <p class="text-center"><a class="text-white fw-light" href="#">Intermedio</a></p>
                        <p class="text-center"><a class="text-white fw-light" href="#">Avanzado</a></p>
                    </div>
                    <div class="col-md-3">
                        <h4 class="text-center text-white mb-4">Siguenos en</h4>
                    </div>
                </div>
                <hr class="bg-white opacity-100 m-0" />
            </div>
            <div id="copyright" class="container-fluid dark-blue-bg py-3">
                <div class="col">
                    <p class="text-center text-white mb-0">English Point 2021©</p>
                </div>
            </div>
        </footer>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
    </body>
</html>
