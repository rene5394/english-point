@extends('layouts.student')

@section('content')
<div id="page-pay-subscription" class="container">
  <input type="hidden" id="paySubscription" data-url="{{route('paySubscription')}}" />
  <div class="row g-5 py-5">
    <div class="col-md-12">
      <h3 class="p-form"><strong>Detalles del curso</strong></h3>
      <hr class="my-3">
      <h5><strong>Curso</strong></h5>
      <p class="p-form">{{$course[0]->modality}} {{$course[0]->level}} {{$course[0]->schedule}}</p>
      <h5><strong>Precio</strong></h5>
      <p class="p-form">${{$course[0]->price}}</p>

      <h3 class="p-form mt-5"><strong>Detalles de pago</strong></h3>
      <hr class="my-3">
      <input type="hidden" id="courseid" name="courseid" value="{{$course[0]->id}}" />
      <div class="row gy-3">
        <div class="col-md-6">
          <label for="cc-name" class="form-label">Nombre en la tarjeta</label>
          <input type="text" class="form-control" id="name" name="name" placeholder="" required="">
          <small class="text-muted">Nombre como se muestra en la tarjeta</small>
          <div class="invalid-feedback">
            Nombre en la tarjeta es requerido
          </div>
        </div>

        <div class="col-md-6">
          <label for="cc-number" class="form-label">Número de la tarjeta</label>
          <input type="text" class="form-control" id="number" name="number" placeholder="" required="">
          <div class="invalid-feedback">
            Número de la tarjeta es requerido
          </div>
        </div>

        <div class="col-md-3">
          <label for="cc-expiration" class="form-label w-100">Expiración</label>
          <input type="text" class="form-control exp-fields" id="expmonth" name="expmonth" placeholder="MM" required="">
          <input type="text" class="form-control exp-fields" id="expyear" name="expyear" placeholder="AAAA" required="">
          <div class="invalid-feedback">
            Expiración es requerido
          </div>
        </div>

        <div class="col-md-3">
          <label for="cc-cvv" class="form-label">CVC</label>
          <input type="text" class="form-control" id="cvc" name="cvc" placeholder="" required="">
          <div class="invalid-feedback">
            Código de seguridad es requerido
          </div>
        </div>

        <div class="col-md-6">
          <img src="{{url('/img/wompi.png')}}">
          <p class="mb-0"><small><strong>Tarjeta de crédito con WOMPI</strong></small></p>
          <p class="mb-0"><small><strong>Pague con seguridad usando su tarjeta de crédito.</strong></small></p>
        </div>
      </div>

            <hr class="my-4">

            <button id="submitpayment" class="w-100 btn btn-dark-blue-bg btn-lg">Pagar</button>
        </div>
    </div>
</div>

@endsection