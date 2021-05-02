@extends('layouts.admin')

@section('content')
    <div class="container-fluid m-0 p-0">
        <div class="row row-cols-3 align-items-stretch">
            <div class="col-md-12">
                <h2 class="mb-3">Listado de Cursos</h2>
                <table class="table table-striped table-bordered">
                    <thead class="table-dark dark-blue-bg">
                        <tr>
                            <th>Curso</th>
                            <th>Horario</th>
                            <th>Nivel</th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody id="table-courses">
                    @foreach($courses as $course)
                        <tr data-id="{{$course->id}}">
                            <td>{{$course->course}}</td>
                            <td>{{$course->schedule}}</td>
                            <td>{{$course->level}}</td>
                            <td><button type="button" class="btn btn-success">Editar</button></td>
                            @if($course->active == 1)
                            <td><button type="button" class="btn btn-primary" disabled>Activar</button></td>
                            <td><button type="button" class="btn btn-danger">Desactivar</button></td>
                            @else
                            <td><button type="button" class="btn btn-primary">Activar</button></td>
                            <td><button type="button" class="btn btn-danger" disabled>Desactivar</button></td>
                            @endif
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection