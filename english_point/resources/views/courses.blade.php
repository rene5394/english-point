@extends('layouts.website')

@section('content')

    <div class="container-fluid services-bg p-0 m-0">
        <div class="container py-6">
            <h1 class="text-center mb-4">Cursos grupales</h1>
        </div>
    </div>

    <div class="container-fluid dark-blue-bg p-0 m-0">
        <div class="container py-4">
            <div class="row">
                <div class="col-md-4">
                    <h3 class="text-center text-white">Paso 1</h3>
                </div>
                <div class="col-md-4">
                    <h3 class="text-center text-white">Paso 2</h3>
                </div>
                <div class="col-md-4">
                    <h3 class="text-center text-white">Paso 3</h3>
                </div>
            </div>
        </div>
    </div>

    <div class="container my-5">
        <div class="row mb-3 text-center">
            <div class="offset-lg-2 col-lg-4">
                <div class="card mb-4 rounded-3 shadow-sm dark-blue-border">
                    <div class="card-header py-3 text-white dark-blue-bg">
                        <h3 class="my-0 fw-normal px25">Cursos Intensivos</h4>
                    </div>
                    <div class="card-body">
                        <h1 class="card-title pricing-card-title">$40<small class="text-muted fw-light">/mes</small></h1>
                        <ul class="list-unstyled list-courses mt-3 mb-4">
                            <li>Básico</li>
                            <li>Intermedio</li>
                            <li>Intermedio II</li>
                            <li>Avanzado</li>
                            <li>Avanzado II</li>
                        </ul>
                        <a href="{{route('inscripcionCursos')}}" class="w-100 btn btn-lg btn-dark-blue-bg">Inscribirme</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card mb-4 rounded-3 shadow-sm dark-blue-border">
                    <div class="card-header py-3 text-white btn-dark-blue-bg">
                        <h3 class="my-0 fw-normal px25">Cursos Sabatinos</h4>
                    </div>
                    <div class="card-body">
                        <h1 class="card-title pricing-card-title">$30<small class="text-muted fw-light">/mes</small></h1>
                        <ul class="list-unstyled list-courses mt-3 mb-4">
                            <li>Básico</li>
                            <li>Intermedio</li>
                            <li>Intermedio II</li>
                            <li>Avanzado</li>
                            <li>Avanzado II</li>
                        </ul>
                        <a href="{{route('inscripcionCursos')}}" class="w-100 btn btn-lg btn-dark-blue-bg">Inscribirme</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection