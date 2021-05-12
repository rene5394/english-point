@extends('layouts.student')

@section('content')
<div id="page-student-dashboard" class="container-fluid m-0 p-0">
    <input type="hidden" id="editUserData" data-url="{{route('estudianteEditarInformacion')}}" />
    <div class="row row-cols-1 align-items-stretch py-5">

        <div class="col">
                <h2 class="text-center fw-bold mb-3">Mi perfil</h2>
                <p class="mb-1"><span class="fw-bold">Nombre:</span></p>
                <input id="name" name="name" class="form-control form-edit-fields mb-4" type="text" value="{{$userData[0]->name}}" disabled>
                <p class="mb-1"><span class="fw-bold">Email:</span></p>
                <input id="email" name="email" class="form-control form-edit-fields mb-4" type="text" value="{{$userData[0]->email}}" disabled>
                <p class="mb-1"><span class="fw-bold">Dirección:</span></p>
                <input id="address" name="address" class="form-control form-edit-fields mb-3" type="text" value="{{$userData[0]->address}}" disabled>
                <p class="mb-1"><span class="fw-bold">Teléfono:</span></p>
                <input id="phone" name="phone" class="form-control form-edit-fields mb-3" type="text" value="{{$userData[0]->phone}}" disabled>
                <p class="mb-1"><span class="fw-bold">Preferencia de notificación:</span></p>
                <select id="preference" name="preference" class="select-preference form-control form-edit-fields mb-4" disabled>
                @foreach ($preferences as $preference)
                    @if($preference->id == $userData[0]->noti_id)
                        <option value="{{$preference->id}}" selected>{{$preference->preference}}</option>
                    @else
                        <option value="{{$preference->id}}">{{$preference->preference}}</option>
                    @endif
                @endforeach
                </select>

                <button type="button" class="btn btn-success edit me-md-2">Editar</button>
                <button type="button" class="btn btn-primary save" disabled>Guardar Cambios</button>
        </div>

    </div>

</div>

@endsection