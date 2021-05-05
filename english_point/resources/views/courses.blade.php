@extends('layouts.website')

@section('content')
    <div class="container my-5">
        <div class="row">
            <div class="col-md-12">
                <h2 class="text-center mb-5">Cursos disponibles</h2>
            </div>
        </div>
        <div class="row mb-3 text-center">
            <div class="offset-lg-2 col-lg-4">
                <div class="card mb-4 rounded-3 shadow-sm dark-blue-border">
                    <div class="card-header py-3 text-white dark-blue-bg">
                        <h4 class="my-0 fw-normal">Cursos Intensivos</h4>
                    </div>
                    <div class="card-body">
                        <h1 class="card-title pricing-card-title">$40<small class="text-muted fw-light">/mes</small></h1>
                        <ul class="list-unstyled mt-3 mb-4">
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
                        <h4 class="my-0 fw-normal">Cursos Sabatinos</h4>
                    </div>
                    <div class="card-body">
                        <h1 class="card-title pricing-card-title">$30<small class="text-muted fw-light">/mes</small></h1>
                        <ul class="list-unstyled mt-3 mb-4">
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