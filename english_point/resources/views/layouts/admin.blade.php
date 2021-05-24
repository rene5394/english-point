<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Styles -->
        <link rel="icon" href="{{url('/img/favicon.png')}}" type="image/png">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Maven+Pro:wght@400;500;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="{{url('/css/admin.css')}}">
        <link rel="stylesheet" href="{{url('/css/datepicker.css')}}">
    </head>
    <body>

    <!-- Menu mobile instead sidebar -->    
    <header class="bg-danger fixed-top d-block d-lg-none">
        <nav class="navbar navbar-expand-lg navbar-light bg-white">
            <div class="container">
                 <a class="navbar-brand" href="{{route('home')}}">
                    <img src="{{url('img/english-point-logo.png')}}" alt="English Point Logo" width="65" height="auto">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="nav ms-auto mb-2 mb-lg-0 d-lg-flex d-block">
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('listCourses')}}">Lista de cursos</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="{{route('createUser')}}">Agregar estudiante</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="{{route('studentsByCourse')}}">Estudiantes por curso</a>
                        </li>
                        <li class="nav-item d-none">
                            <a class="nav-link" href="#">Generar página de pagos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('transactions')}}">Ver transacciones</a>
                        </li>
                        <li class="nav-item">
                            @isset(Auth::user()->role_id)
                                @if(Auth::user()->role_id == 1)
                                    <a class="nav-link" href="{{route('dashboard')}}">Mi Perfil</a>
                                @elseif(Auth::user()->role_id == 2)
                                    <a class="nav-link" href="{{route('dashboardStudent')}}">Mi Perfil</a>
                                @endif    
                            @endisset    
                        </li>
                        <li class="nav-item">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                    <input class="dropdown-item" type="submit" value="Cerrar sesión">
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    
    <div class="container-fluid" id="wrapper">
        <div class="row">
            <!-- Sidebar -->
            <div id="sidebar" class="d-flex flex-column p-3 text-white dark-blue-bg vh-100 float-start position-fixed d-none d-lg-block">
                <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                    <i class="bi bi-back me-2"></i>
                    <span class="fs-4">English Point</span>
                </a>
                <hr>
                <ul class="nav nav-pills flex-column mb-auto">
                    <li class="mb-1">
                        <button class="btn btn-toggle align-items-center rounded collapsed text-white w-100 py-2" data-bs-toggle="collapse" data-bs-target="#courses-collapse" aria-expanded="false">
                            Cursos Grupales
                        </button>
                        <div class="collapse" id="courses-collapse" style="">
                            <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                            <li><a href="{{route('listCourses')}}" class="link-dark rounded text-white">Lista de cursos</a></li>
                            <li><a href="{{route('createUser')}}" class="link-dark rounded text-white">Agregar estudiante</a></li>
                            <li><a href="{{route('studentsByCourse')}}" class="link-dark rounded text-white">Estudiantes por curso</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="mb-1">
                        <button class="btn btn-toggle align-items-center rounded collapsed text-white w-100 py-2" data-bs-toggle="collapse" data-bs-target="#reinforcement-collapse" aria-expanded="false">
                            Pagos
                        </button>
                        <div class="collapse" id="reinforcement-collapse">
                            <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                            <li><a href="#" class="link-dark rounded text-white">Generar página de pago</a></li>
                            <li><a href="{{route('transactions')}}" class="link-dark rounded text-white">Ver transacciones</a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
                <hr>
                <div class="dropdown">
                    <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="https://github.com/mdo.png" alt="mdo" width="32" height="32" class="rounded-circle me-2 d-none">
                        <strong>{{Auth::user()->name}}</strong>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
                        <li><a class="dropdown-item" href="#">Profile</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <!-- Logout -->
                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                    <input class="dropdown-item" type="submit" value="Log out">
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- End Sidebar -->
            <!-- Content -->
            <div id="content-next-sidebar" class="d-flex flex-column p-5 vh-100">
                @yield('content')
            </div>
            <!-- End Content -->
        </div>
    </div>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

        <script type="text/javascript" src="{{url('/js/admin/datepicker.js')}}"></script>
        <script type="text/javascript" src="{{url('/js/admin/courses.js')}}"></script>
        <script type="text/javascript" src="{{url('/js/admin/create-user.js')}}"></script>
        <script type="text/javascript" src="{{url('/js/admin/students-course.js')}}"></script>
        <script type="text/javascript" src="{{url('/js/admin/transactions.js')}}"></script>
        
    </body>
</html>
