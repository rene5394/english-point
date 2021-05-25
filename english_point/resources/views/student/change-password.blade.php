@extends('layouts.student')

@section('content')
<div id="changePassword" class="container">
    <input type="hidden" id="changePasswordUrl" data-url="{{route('changePassword')}}" />
  <main>
    <div class="row pt-5 text-center">
        <div class="col-md-12 col-lg-8 offset-lg-2">
            <h2>Formulario cambiar contraseña</h2>
        </div>
    </div>

    <div class="row g-5 py-5">
      <div class="col-md-12 col-lg-8 offset-lg-2">
          <div class="row g-3">
          <div class="col-12">
              <label for="password" class="form-label">Contraseña Actual</label>
              <input type="password" class="form-control" id="password" name="password" required="">
            </div>

            <div class="col-12">
              <label for="newpassword" class="form-label">Nueva Contraseña</label>
              <input type="password" class="form-control" id="newpassword" name="newpassword" required="">
            </div>

            <div class="col-12">
              <label for="newpassword2" class="form-label">Confirmar Nueva Contraseña</label>
              <input type="password" class="form-control" id="newpassword2" name="newpassword2" required="">
              <p id="p-nomatch" class="d-none"><small class="text-danger">Los contraseñas no concuerdan o el campo de contraseña actual esta vacío</small></p>
            </div>

          </div>

          <button id="submitform" class="w-100 mt-4 btn btn-dark-blue-bg btn-lg" type="submit">Cambiar contraseña</button>
      </div>
    </div>
  </main>
</div>
@endsection