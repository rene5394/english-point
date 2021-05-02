@extends('layouts.website')

@section('content')
    <div class="container my-5">
        <div class="row">
            <div class="col-md-12">
                <h2 class="text-center mb-5">Cursos disponibles</h2>
            </div>
        </div>
        <div class="row row-cols-1 row-cols-md-3 mb-3 text-center">
            @foreach($courses as $course)
            <div class="col">
                <div class="card mb-4 rounded-3 shadow-sm border-primary">
                    <div class="card-header py-3 text-white btn-dark-blue-bg">
                        <h4 class="my-0 fw-normal">{{$course->course}}</h4>
                    </div>
                    <div class="card-body">
                        <h1 class="card-title pricing-card-title">$29<small class="text-muted fw-light">/mo</small></h1>
                        <ul class="list-unstyled mt-3 mb-4">
                        <li>30 users included</li>
                        <li>15 GB of storage</li>
                        <li>Phone and email support</li>
                        <li>Help center access</li>
                        </ul>
                        <button type="button" class="w-100 btn btn-lg btn-dark-blue-bg">Inscribirme</button>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
@endsection