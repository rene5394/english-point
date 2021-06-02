@extends('layouts.website')

@section('content')

<div id="courses" class="container-fluid services-bg p-0 m-0">
    <div class="container py-6">
        <h1 class="text-center mb-4">Cursos grupales</h1>
    </div>
</div>

<div class="container mt-5 mb-4">
    <div class="row mb-3 text-center">
        <div class="offset-lg-2 col-lg-4">
            <div class="card mb-4 rounded-3 shadow-sm dark-blue-border">
                <div class="card-header py-3 text-white dark-blue-bg">
                    <h3 class="my-0 fw-normal px25">Cursos Intensivos</h4>
                </div>
                <div class="card-body">
                    <h1 class="card-title pricing-card-title">$40<small class="text-muted fw-light">/mes</small></h1>
                    <ul class="list-unstyled list-courses mt-3 mb-4">
                        <li>Básico</li>
                        <li>Intermedio</li>
                        <li>Avanzado</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card mb-4 rounded-3 shadow-sm dark-blue-border">
                <div class="card-header py-3 text-white btn-dark-blue-bg">
                    <h3 class="my-0 fw-normal px25">Cursos Sabatinos</h4>
                </div>
                <div class="card-body">
                    <h1 class="card-title pricing-card-title">$30<small class="text-muted fw-light">/mes</small></h1>
                    <ul class="list-unstyled list-courses mt-3 mb-4">
                        <li>Básico</li>
                        <li>Intermedio</li>
                        <li>Avanzado</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid p-0 m-0">
    <input type="hidden" id="contact-form-url" data-url="{{route('contact-form-cursos')}}" />
    <div class="container pb-5">
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
                    <label for="address">Dirección:</label><br>
                    <input type="text" id="address" name="address">
                    <label for="notification">Preferencia comunicación:</label><br>
                    <select id="notification" name="notification">
                        <option value="Whatsapp">Whatsapp</option>
                        <option value="Correo">Correo</option>
                    </select><br>
                    <label for="level">Nivel de inglés:</label><br>
                    <select id="level" name="level">
                        <option value="Básico">Básico</option>
                        <option value="Intermedio">Intermedio</option>
                        <option value="Avanzado">Avanzado</option>
                    </select><br>
                    <label for="modality">Modalidad:</label><br>
                    <select id="modality" name="modality">
                        <option value="Intensivo">Intensivo</option>
                        <option value="Sabatino">Sabatino</option>
                    </select><br>
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