@extends('layouts.student')

@section('content')
<div id="page-my-transactions" class="container-fluid m-0 p-0">
    <div class="row">
        <div class="col-md-12">
            <h2 class="mb-3">Listado de Transacciones</h2>
            <table class="table table-striped table-bordered">
                <thead class="table-dark dark-blue-bg">
                    <tr>
                        <th>Curso</th>
                        <th>Id de transacción</th>
                        <th>Pago</th>
                        <th>Fecha de pago</th>
                    </tr>
                </thead>
                <tbody id="table-courses">
                @foreach($transactions as $transaction)
                    <tr>
                        <td>{{$transaction->modality}} {{$transaction->level}}</td>
                        <td>{{$transaction->wompi_id_transaction}}</td>
                        <td>${{$transaction->amount}}</td>
                        <td>{{$transaction->created_at}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection