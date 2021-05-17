@extends('layouts.admin')

@section('content')
<div id="page-students-courses" class="container-fluid m-0 p-0">
    <input type="hidden" id="coursesByPattern" data-url="{{route('admin.coursesByPattern')}}" />
    <input type="hidden" id="studentsByPattern" data-url="{{route('admin.studentsByPattern')}}" />
    <div class="row row-cols-3 align-items-stretch">
        <div class="col-md-6">
            <h2 class="w-100 mb-3 mt-2">Búsqueda de Estudiantes</h2>
            <div id="card-ticket-report" class="card rounded-0">
                <div class="card-header row mx-0 py-4">
                    <div id="radiosSearchType">
                        <div class="form-check form-check-inline width-fit-content">
                            <input class="form-check-input" type="radio" name="studentsBy" id="radioName" value="Name">
                            <label class="form-check-label" for="radioName">Nombre</label>
                        </div>
                        <div class="form-check form-check-inline width-fit-content mb-2">
                            <input class="form-check-input" type="radio" name="studentsBy" id="radioCourse" value="Course">
                            <label class="form-check-label" for="radioCourse">Curso</label>
                        </div>
                    </div>
                    <input id="optionName" type="text" class="options form-control mb-3 mt-2 d-none" name="name" placeholder="Escribir nombre">
                    <div id="optionCourse" class="options d-none">
                        <label class="mt-2 mb-1 w-100">Seleccionar patron de búsqueda</label>
                        <div id="radiosSearchCourseType">
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
                        <select id="selectCourse" class="form-control mb-3 d-none">
                            <option value="" disabled selected>Seleccionar curso</option>
                        </select>
                    </div>
                    <button id="searchStudents" class="btn btn-success ml-md-2 mt-2 mt-md-0">Buscar</button>
                </div>
            </div>
        </div>    
        <div class="col-md-12">    
            <table class="table table-striped table-bordered mt-4">
                <thead class="table-dark dark-blue-bg">
                    <tr>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Teléfono</th>
                        <th>Inscrito</th>
                    </tr>
                </thead>
                <tbody id="table-students">
                </tbody> 
            </table>      
        </div>
    </div>
</div>
@endsection