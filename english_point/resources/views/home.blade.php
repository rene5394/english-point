@extends('layouts.website')

@section('content')
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
        <input type="hidden" id="contact-form-url" data-url="{{route('contact-form')}}" />
        <div class="carousel-indicators d-none">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{url('/img/slide1.jpg')}}" class="d-block w-100" alt="Slide 1">
            </div>
            <div class="carousel-item">
                <img src="{{url('/img/slide2.jpg')}}" class="d-block w-100" alt="Slide 2">
            </div>
            <div class="carousel-item">
                <img src="{{url('/img/slide3.jpg')}}" class="d-block w-100" alt="Slide 3">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <div class="d-flex align-items-center">
        <strong>Loading...</strong>
        <div class="spinner-border ms-auto" role="status" aria-hidden="true"></div>
    </div>

    <span id="acerca-de-nosotros" class="anchor-links"></span>
    <div class="container py-5">
        <div class="row">
            <div class="col">
                <h2 class="text-center mb-4">Acerca de English Point</h2>
                <p>En Marzo de 2016, nace English Point en el corazón de Santa Ana con la finalidad de ser una academia de inglés diferente al resto ya que se enfoca en ofrecer todos los servicios relacionados al idioma, estos son: Clases de refuerzo, cursos sistematizados, traducciones e interpretaciones.</p>
                <p>Todo comenzó en una iglesia ofreciendo refuerzo y sala de tareas de manera personalizada, después de un mes los servicios se trasladaron a un local en el que se abrieron cursos sabatinos e intensivos. Con el paso del tiempo, English Point se ha venido ganando el cariño y la confianza de los Santanecos, una de los mayores beneficios que se han ofrecido todo el tiempo es el proporcionar clases cien por ciento personalizadas o en grupos sumamente reducidos pues está comprobado que esto optimiza el aprendizaje.</p>
                <p>Durante el año 2020 debido a la pandemia que afectó a todos, English Point trasladó sus servicios a modalidad virtual y en Diciembre, toda la actividad de la academia fue colocada en pausa mientras se consolidaba una manera más efectiva de trabajar. Hoy en día, y más fuerte que nunca, English Point vuelve a ofrecer todos sus servicios con la calidad de siempre para todo el país.</p>
            </div>
        </div>
    </div>

    <span id="servicios" class="anchor-links"></span>
    <div class="container-fluid gray-bg p-0 m-0">
        <div class="container py-5">
            <div class="row pt-3">
                <div class="col mb-2">
                    <h2 class="text-center mb-4">Servicios</h2>
                </div>
            </div>
            <div class="row pb-3">
                <div class="col-md-3">
                    <img class="img-fluid img-max-width-150 mb-3" src="{{url('/img/cursos-grupales.png')}}"/>
                    <h3 class="text-center mb-3">Cursos grupales</h3>
                    <a class="btn btn-dark-blue-bg mx-auto d-table" href="{{route('courses')}}" role="button">Ver opciones</a>
                </div>
                <div class="col-md-3 mt-5 mt-md-0">
                    <img class="img-fluid img-max-width-150 mb-3" src="{{url('/img/refuerzo.png')}}"/>
                    <h3 class="text-center mb-3">Refuerzo</h3>
                    <a class="btn btn-dark-blue-bg mx-auto d-table" href="{{route('reinforcement')}}" role="button">Contáctanos</a>
                </div>
                <div class="col-md-3 mt-5 mt-md-0">
                    <img class="img-fluid img-max-width-150 mb-3" src="{{url('/img/traduccion.png')}}"/>
                    <h3 class="text-center mb-3">Traducción</h3>
                    <a class="btn btn-dark-blue-bg mx-auto d-table" href="{{route('translation')}}" role="button">Contáctanos</a>
                </div>
                <div class="col-md-3 mt-5 mt-md-0">
                    <img class="img-fluid img-max-width-150 mb-3" src="{{url('/img/interpretacion.png')}}"/>
                    <h5 class="text-center mb-3">Interpretación</h5>
                    <a class="btn btn-dark-blue-bg mx-auto d-table" href="{{route('interpretation')}}" role="button">Contáctanos</a>
                </div>
            </div>
        </div>
    </div>

    <span id="testimonios" class="anchor-links d-none"></span>
    <div class="container py-5 d-none">
        <div class="row">
            <div class="col">
                <h2 class="text-center mb-4">Testimonios</h2>
                <p>En Marzo de 2016, nace English Point en el corazón de Santa Ana con la finalidad de ser una academia de inglés diferente al resto ya que se enfoca en ofrecer todos los servicios relacionados al idioma, estos son: Clases de refuerzo, cursos sistematizados, traducciones e interpretaciones.</p>
                <p>Todo comenzó en una iglesia ofreciendo refuerzo y sala de tareas de manera personalizada, después de un mes los servicios se trasladaron a un local en el que se abrieron cursos sabatinos e intensivos. Con el paso del tiempo, English Point se ha venido ganando el cariño y la confianza de los Santanecos, una de los mayores beneficios que se han ofrecido todo el tiempo es el proporcionar clases cien por ciento personalizadas o en grupos sumamente reducidos pues está comprobado que esto optimiza el aprendizaje.</p>
                <p>Durante el año 2020 debido a la pandemia que afectó a todos, English Point trasladó sus servicios a modalidad virtual y en Diciembre, toda la actividad de la academia fue colocada en pausa mientras se consolidaba una manera más efectiva de trabajar. Hoy en día, y más fuerte que nunca, English Point vuelve a ofrecer todos sus servicios con la calidad de siempre para todo el país.</p>
            </div>
        </div>
    </div>

    <span id="contactanos" class="anchor-links"></span>
    <div class="container-fluid p-0 m-0">
        <div class="container py-5">
            <div class="row">
                <div class="col-md-6">
                    <h2 class="text-center mb-4">Contáctanos</h2>
                    <div id="contact-form">
                        <label for="name">Nombre:</label><br>
                        <input type="text" id="name" name="name"><br>
                        <label for="email">Correo:</label><br>
                        <input type="email" id="email" name="email"><br>
                        <label for="phone">Teléfono:</label><br>
                        <input type="tel" id="phone" name="phone">
                        <label for="message">Mensaje:</label><br>
                        <textarea id="message" name="message"></textarea>
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