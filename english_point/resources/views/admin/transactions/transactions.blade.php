@extends('layouts.admin')

@section('content')
    <div id="transactions" class="container-fluid m-0 p-0">
        <input type="hidden" id="coursesByPattern" data-url="{{route('admin.coursesByPattern')}}" />
        <input type="hidden" id="activeCourse" data-url="{{route('admin.activeCourse')}}" />
        <input type="hidden" id="deactiveCourse" data-url="{{route('admin.deactiveCourse')}}" />
        <div class="row row-cols-3 align-items-stretch">
            <div class="col-md-6 mb-4">
                <h2 class="w-100 mb-3 mt-2">Filtrar Transacciones</h2>
                <div id="card-ticket-report" class="card rounded-0">
                    <div class="card-header row mx-0 py-4">
                        <select id="selectModality" class="select-patterns form-control mb-3">
                            <option value="" disabled selected>Seleccionar modalidad</option>
                            @foreach($modalities as $modality)
                            <option value="{{$modality->id}}">{{$modality->modality}}</option>
                            @endforeach
                        </select>
                        <select id="selectLevel" class="select-patterns form-control mb-3">
                            <option value="" disabled selected>Seleccionar nivel</option>
                            @foreach($levels as $level)
                            <option value="{{$level->id}}">{{$level->level}}</option>
                            @endforeach
                        </select>
                        <input type="text" id="date1" class="datepicker form-control mb-3" placeholder="Fecha de inicio" />
                        <input type="text" id="date2" class="datepicker form-control mb-3" placeholder="Fecha de fin"/>
                        <button id="loadCourses" data-load="" class="btn btn-success ml-md-2 mt-2 mt-md-0">Cargar Transacciones</button>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <h2 class="mb-0">Listado de Transacciones</h2>
                <p><small>Por defecto se muestra las transacciones de la última semana*</small><p>
                <table class="table table-striped table-bordered">
                    <thead class="table-dark dark-blue-bg">
                        <tr>
                            <th>Nombre</th>
                            <th>Curso</th>
                            <th>Id de transacción</th>
                            <th>Monto</th>
                            <th>Fecha de pago</th>
                        </tr>
                    </thead>
                    <tbody id="table-courses">
                    @foreach($transactions as $transaction)
                        <tr>
                            <td>{{$transaction->name}}</td>
                            <td>{{$transaction->modality}} {{$transaction->level}} {{$transaction->schedule}}</td>
                            <td>{{$transaction->wompi_id_transaction}}</td>
                            <td>{{$transaction->amount}}</td>
                            <td>{{$transaction->created_at}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection