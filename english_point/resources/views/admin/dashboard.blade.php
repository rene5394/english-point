@extends('layouts.admin')

@section('content')
<div id="page-admin-dashboard" class="container-fluid m-0 p-0">
    <input type="hidden" id="editUserData" data-url="{{route('adminEditarInformacion')}}" />
    <div class="row row-cols-1 align-items-stretch py-5">

        <div class="col">
                <h2 class="text-center fw-bold mb-3">Mi perfil</h2>
                <p class="mb-1"><span class="fw-bold">Nombre:</span></p>
                <input id="name" name="name" class="form-control form-edit-fields mb-4" type="text" value="{{$userData[0]->name}}" disabled>
                <p class="mb-1"><span class="fw-bold">Email:</span></p>
                <input id="email" name="email" class="form-control form-edit-fields mb-4" type="text" value="{{$userData[0]->email}}" disabled>
                <button type="button" class="btn btn-success edit me-md-2">Editar</button>
                <button type="button" class="btn btn-primary save" disabled>Guardar Cambios</button>
        </div>

    </div>

</div>

@endsection