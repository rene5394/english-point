@extends('layouts.guest')

@section('content')
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="img/slide1.jpg" class="d-block w-100" alt="Slide 1">
            </div>
            <div class="carousel-item">
                <img src="img/slide2.jpg" class="d-block w-100" alt="Slide 2">
            </div>
            <div class="carousel-item">
                <img src="img/slide3.jpg" class="d-block w-100" alt="Slide 3">
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

    <span id="acerca-de-nosotros" class="anchor-links"></span>
    <div class="container py-5">
        <div class="row">
            <div class="col">
                <h2 class="text-center mb-4">Acerca de nosotros</h2>
                <p>En Marzo de 2016, nace English Point en el corazón de Santa Ana con la finalidad de ser una academia de inglés diferente al resto ya que se enfoca en ofrecer todos los servicios relacionados al idioma, estos son: Clases de refuerzo, cursos sistematizados, traducciones e interpretaciones.</p>
                <p>Todo comenzó en una iglesia ofreciendo refuerzo y sala de tareas de manera personalizada, después de un mes los servicios se trasladaron a un local en el que se abrieron cursos sabatinos e intensivos. Con el paso del tiempo, English Point se ha venido ganando el cariño y la confianza de los Santanecos, una de los mayores beneficios que se han ofrecido todo el tiempo es el proporcionar clases cien por ciento personalizadas o en grupos sumamente reducidos pues está comprobado que esto optimiza el aprendizaje.</p>
                <p>Durante el año 2020 debido a la pandemia que afecto a todos, English Point trasladó sus servicios a modalidad virtual y en Diciembre, toda la actividad de la academia fue colocada en pausa mientras se consolidaba una manera más efectiva de trabajar. Hoy en día, y más fuerte que nunca, English Point vuelve a ofrecer todos sus servicios con la calidad de siempre para todo el país.</p>
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
                    <img class="img-fluid mb-3" src="img/slide1.jpg"/>
                    <h3 class="text-center mb-3">Cursos grupales</h3>
                    <a class="btn btn-dark-blue-bg mx-auto d-table" href="#" role="button">Ver cursos</a>
                </div>
                <div class="col-md-3">
                    <img class="img-fluid mb-3" src="img/slide1.jpg"/>
                    <h3 class="text-center mb-3">Refuerzo</h3>
                    <a class="btn btn-dark-blue-bg mx-auto d-table" href="#" role="button">Ver opciones</a>
                </div>
                <div class="col-md-3">
                    <img class="img-fluid mb-3" src="img/slide1.jpg"/>
                    <h3 class="text-center mb-3">Traducción</h3>
                    <a class="btn btn-dark-blue-bg mx-auto d-table" href="#" role="button">Más información</a>
                </div>
                <div class="col-md-3">
                    <img class="img-fluid mb-3" src="img/slide1.jpg"/>
                    <h5 class="text-center mb-3">Interpretación</h5>
                    <a class="btn btn-dark-blue-bg mx-auto d-table" href="#" role="button">Más información</a>
                </div>
            </div>
        </div>
    </div>

    <span id="testimonios" class="anchor-links"></span>
    <div class="container py-5">
        <div class="row">
            <div class="col">
                <h2 class="text-center mb-4">Testimonios</h2>
                <p>En Marzo de 2016, nace English Point en el corazón de Santa Ana con la finalidad de ser una academia de inglés diferente al resto ya que se enfoca en ofrecer todos los servicios relacionados al idioma, estos son: Clases de refuerzo, cursos sistematizados, traducciones e interpretaciones.</p>
                <p>Todo comenzó en una iglesia ofreciendo refuerzo y sala de tareas de manera personalizada, después de un mes los servicios se trasladaron a un local en el que se abrieron cursos sabatinos e intensivos. Con el paso del tiempo, English Point se ha venido ganando el cariño y la confianza de los Santanecos, una de los mayores beneficios que se han ofrecido todo el tiempo es el proporcionar clases cien por ciento personalizadas o en grupos sumamente reducidos pues está comprobado que esto optimiza el aprendizaje.</p>
                <p>Durante el año 2020 debido a la pandemia que afecto a todos, English Point trasladó sus servicios a modalidad virtual y en Diciembre, toda la actividad de la academia fue colocada en pausa mientras se consolidaba una manera más efectiva de trabajar. Hoy en día, y más fuerte que nunca, English Point vuelve a ofrecer todos sus servicios con la calidad de siempre para todo el país.</p>
            </div>
        </div>
    </div>

    <span id="contactanos" class="anchor-links"></span>
    <div class="container-fluid gray-bg p-0 m-0">
        <div class="container py-5">
            <div class="row">
                <div class="col">
                    <h2 class="text-center mb-4">Contáctanos</h2>
                    <p>En Marzo de 2016, nace English Point en el corazón de Santa Ana con la finalidad de ser una academia de inglés diferente al resto ya que se enfoca en ofrecer todos los servicios relacionados al idioma, estos son: Clases de refuerzo, cursos sistematizados, traducciones e interpretaciones.</p>
                    <p>Todo comenzó en una iglesia ofreciendo refuerzo y sala de tareas de manera personalizada, después de un mes los servicios se trasladaron a un local en el que se abrieron cursos sabatinos e intensivos. Con el paso del tiempo, English Point se ha venido ganando el cariño y la confianza de los Santanecos, una de los mayores beneficios que se han ofrecido todo el tiempo es el proporcionar clases cien por ciento personalizadas o en grupos sumamente reducidos pues está comprobado que esto optimiza el aprendizaje.</p>
                    <p>Durante el año 2020 debido a la pandemia que afecto a todos, English Point trasladó sus servicios a modalidad virtual y en Diciembre, toda la actividad de la academia fue colocada en pausa mientras se consolidaba una manera más efectiva de trabajar. Hoy en día, y más fuerte que nunca, English Point vuelve a ofrecer todos sus servicios con la calidad de siempre para todo el país.</p>
                </div>
            </div>
        </div>
    </div>
@endsection