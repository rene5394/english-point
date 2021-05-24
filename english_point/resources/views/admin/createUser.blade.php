@extends('layouts.admin')

@section('content')
<div id="adduser" class="container">
  <main>
    <div class="row pt-5 text-center">
        <div class="col-md-12 col-lg-8 offset-lg-2">
            <h2>Formulario agregar usuario</h2>
            <p class="lead d-none">Below is an example form built entirely with Bootstrap’s form controls. Each required form group has a validation state that can be triggered by attempting to submit the form.</p>
        </div>
    </div>

    <div class="row g-5 py-5">
      <div class="col-md-12 col-lg-8 offset-lg-2">
        <form method="POST" action="{{ route('registerStudent') }}">
          @csrf
          <div class="row g-3">
            <div class="col-sm-12">
              <label for="fullname" class="form-label">Nombre completo</label>
              <input type="text" class="form-control" id="fullname" name="fullname" required="" style="background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACAAAAAgCAYAAABzenr0AAAAAXNSR0IArs4c6QAAAfBJREFUWAntVk1OwkAUZkoDKza4Utm61iP0AqyIDXahN2BjwiHYGU+gizap4QDuegWN7lyCbMSlCQjU7yO0TOlAi6GwgJc0fT/fzPfmzet0crmD7HsFBAvQbrcrw+Gw5fu+AfOYvgylJ4TwCoVCs1ardYTruqfj8fgV5OUMSVVT93VdP9dAzpVvm5wJHZFbg2LQ2pEYOlZ/oiDvwNcsFoseY4PBwMCrhaeCJyKWZU37KOJcYdi27QdhcuuBIb073BvTNL8ln4NeeR6NRi/wxZKQcGurQs5oNhqLshzVTMBewW/LMU3TTNlO0ieTiStjYhUIyi6DAp0xbEdgTt+LE0aCKQw24U4llsCs4ZRJrYopB6RwqnpA1YQ5NGFZ1YQ41Z5S8IQQdP5laEBRJcD4Vj5DEsW2gE6s6g3d/YP/g+BDnT7GNi2qCjTwGd6riBzHaaCEd3Js01vwCPIbmWBRx1nwAN/1ov+/drgFWIlfKpVukyYihtgkXNp4mABK+1GtVr+SBhJDbBIubVw+Cd/TDgKO2DPiN3YUo6y/nDCNEIsqTKH1en2tcwA9FKEItyDi3aIh8Gl1sRrVnSDzNFDJT1bAy5xpOYGn5fP5JuL95ZjMIn1ya7j5dPGfv0A5eAnpZUY3n5jXcoec5J67D9q+VuAPM47D3XaSeL4AAAAASUVORK5CYII=&quot;); background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: 98% 50%; cursor: auto;">
            </div>

            <div class="col-12">
              <label for="email" class="form-label">Correo electrónico (gmail)</label>
              <input type="email" class="form-control" id="email" name="email" required="">
            </div>

            <div class="col-12">
              <label for="password" class="form-label">Contraseña</label>
              <input type="password" class="form-control" id="password" name="password" required="">
            </div>

            <div class="col-12">
              <label for="password2" class="form-label">Confirmar Contraseña</label>
              <input type="password" class="form-control" id="password2" name="password2" required="">
              <p id="p-nomatch" class="d-none"><small class="text-danger">Los contraseñas no concuerdan</small></p>
            </div>

            <div class="col-12">
              <label for="address" class="form-label">Dirección domiciliar</label>
              <input type="text" class="form-control" id="address" name="address" required="">
            </div>

            <div class="col-12">
              <label for="phone" class="form-label">Número de teléfono</label>
              <input type="text" class="form-control" id="phone" name="phone" required="">
            </div>

            <div class="col-12">
              <label for="preference" class="form-label">¿De qué forma te gustaría recibir recordatorio para tus pagos mensuales?</label>
              @foreach($preferences as $preference)
              <div class="form-check">
                <input class="form-check-input" type="radio" name="preference" id="preference{{$preference->id}}" value="{{$preference->id}}" required>
                <label class="form-check-label" for="preference{{$preference->id}}">
                  {{$preference->preference}}
                </label>
              </div>
              @endforeach
            </div>

          </div>

          <hr class="my-4">

          <button id="submitform" class="w-100 btn btn-dark-blue-bg btn-lg" type="submit" disabled>Registrarse</button>
        </form>
      </div>
    </div>
  </main>
</div>
@endsection