@extends('layouts.website')

@section('content')

<div id="translation" class="container-fluid p-0 m-0">
    <input type="hidden" id="contact-form-url" data-url="{{route('contact-form-traduccion')}}" />
    <div class="container py-5">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <h2 class="text-center mb-4">Traducción</h2>
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
                        <option value="correo">Correo</option>
                    </select><br>
                    <label for="notification">Tipo de documento:</label><br>
                    <select id="document" name="notification">
                        <option value="tradicional">Tradicional</option>
                        <option value="legal autenticado">Legal autenticado</option>
                        <option value="legal no autenticado">Legal no autenticado</option>
                    </select><br>
                    <input type="submit" id="send" class="btn-dark-blue-bg text-white mt-2" name="send" value="Enviar">
                </div>
            </div>
        </div>
    </div>
</div>

@endsection