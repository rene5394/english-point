@extends('layouts.website')

@section('content')

<div id="interpretation" class="container-fluid services-bg p-0 m-0">
    <div class="container py-6">
        <h1 class="text-center mb-4">Interpretación</h1>
    </div>
</div>

<div class="container-fluid p-0 m-0">
    <input type="hidden" id="contact-form-url" data-url="{{route('contact-form-interpretacion')}}" />
    <div class="container py-5">
        <div class="row">
            <div class="col-md-6 my-auto">
                <h2 class="text-center mb-4">Fomulario</h2>
                <div id="contact-form">
                    <label for="name">Nombre:</label><br>
                    <input type="text" id="name" name="name"><br>
                    <label for="email">Correo:</label><br>
                    <input type="email" id="email" name="email"><br>
                    <label for="phone">Teléfono:</label><br>
                    <input type="tel" id="phone" name="phone">
                    <label for="notification">Preferencia comunicación:</label><br>
                    <select id="notification" name="notification">
                        <option value="Whatsapp">Whatsapp</option>
                        <option value="Correo">Correo</option>
                    </select><br>
                    <label for="details">Detalles:</label><br>
                    <textarea id="details" name="details"></textarea>
                    <input type="submit" id="send" class="btn-dark-blue-bg text-white mt-2" name="send" value="Enviar">
                </div>
            </div>
            <div class="col-md-6">
                <img class="img-fluid" src="{{url('/img/woman-service.jpg')}}" alt="Service">
            </div>
        </div>
    </div>
</div>

@endsection