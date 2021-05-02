@extends('layouts.admin')

@section('content')
<div class="container-fluid m-0 p-0">
    <div class="row row-cols-3 align-items-stretch">
        <div class="col-md-12">
            <h2 class="w-100 mb-3 mt-2">Estudiantes por curso</h2>
            <div id="card-ticket-report" class="card rounded-0">
                <div class="card-header row mx-0 py-4">
                    <select id="cursos" class="form-control mb-2">
                        <option value="" disabled selected>Seleccionar curso</option>
                        @foreach($courses as $course)
                        <option value="{{$course->id}}">{{$course->course}}</option>
                        @endforeach
                    </select>
                    <button id="searchStudents" class="btn btn-success ml-md-2 mt-2 mt-md-0">Buscar</button>
                </div>
            </div>
            <table class="table table-striped table-bordered mt-4">
                <thead class="table-dark dark-blue-bg">
                    <tr>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Teléfono</th>
                        <th>Inscrito</th>
                    </tr>
                </thead>
                <tbody id="table-courses">
                </tbody> 
            </table>      
        </div>
    </div>
</div>
@endsection