@extends('layouts.admin')

@section('content')
    <div id="page-list-courses" class="container-fluid m-0 p-0">
        <input type="hidden" id="coursesByPattern" data-url="{{route('admin.coursesByPattern')}}" />
        <input type="hidden" id="activeCourse" data-url="{{route('admin.activeCourse')}}" />
        <input type="hidden" id="deactiveCourse" data-url="{{route('admin.deactiveCourse')}}" />
        <div class="row row-cols-3 align-items-stretch">
            <div class="col-md-6 mb-4">
                <h2 class="w-100 mb-3 mt-2">Búsqueda de Cursos</h2>
                <div id="card-ticket-report" class="card rounded-0">
                    <div class="card-header row mx-0 py-4">
                        <div id="radiosPattern">
                            <div class="form-check form-check-inline width-fit-content">
                                <input class="form-check-input" type="radio" name="coursesBy" id="radioModality" value="Modality">
                                <label class="form-check-label" for="radioModality">Modalidad</label>
                            </div>
                            <div class="form-check form-check-inline width-fit-content mb-2">
                                <input class="form-check-input" type="radio" name="coursesBy" id="radioLevel" value="Level">
                                <label class="form-check-label" for="radioLevel">Nivel</label>
                            </div>
                        </div>
                        <select id="selectModality" class="select-patterns form-control mb-3 d-none">
                            <option value="" disabled selected>Seleccionar modalidad</option>
                            @foreach($modalities as $modality)
                            <option value="{{$modality->id}}">{{$modality->modality}}</option>
                            @endforeach
                        </select>
                        <select id="selectLevel" class="select-patterns form-control mb-3 d-none">
                            <option value="" disabled selected>Seleccionar nivel</option>
                            @foreach($levels as $level)
                            <option value="{{$level->id}}">{{$level->level}}</option>
                            @endforeach
                        </select>
                        <button id="loadCourses" data-load="" class="btn btn-success ml-md-2 mt-2 mt-md-0">Cargar Cursos</button>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <h2 class="mb-3">Listado de Cursos</h2>
                <table class="table table-striped table-bordered">
                    <thead class="table-dark dark-blue-bg">
                        <tr>
                            <th>Nivel</th>
                            <th>Modalidad</th>
                            <th>Horario</th>
                            <th>Precio</th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody id="table-courses">
                    @foreach($courses as $course)
                        <tr data-id="{{$course->id}}">
                            <td>{{$course->level}}</td>
                            <td>{{$course->modality}}</td>
                            <td>{{$course->schedule}}</td>
                            <td>{{$course->price}}</td>
                            <td><button type="button" class="btn btn-success edit">Editar</button></td>
                            @if($course->active == 1)
                            <td><button type="button" class="btn btn-primary active" disabled>Activar</button></td>
                            <td><button type="button" class="btn btn-danger deactive">Desactivar</button></td>
                            @else
                            <td><button type="button" class="btn btn-primary active">Activar</button></td>
                            <td><button type="button" class="btn btn-danger deactive" disabled>Desactivar</button></td>
                            @endif
                            <td><button type="button" class="btn btn-warning payment-link" data-url="{{url('/estudiante/pagar-suscripcion')}}">URL de pago</button></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection