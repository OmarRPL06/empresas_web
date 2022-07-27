@extends('layouts.base')
@section('contenido')
    <nav aria-label="breadcrumb" class="margin-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Inicio</a></li>
            <li class="breadcrumb-item active" aria-current="page">Ubicación</li>
        </ol>
    </nav>
    <div class="container-card-map">
        <div class="card ">
            <div class="card-header">
                <h5 class="card-title text-center"><i>{{ $empresa->nombre }}</i></h5>
            </div>
            <div id="map" class="card-img"></div>
            <div class="card-body">
                {{-- <h5 class="card-title">{{ $empresa->nombre }}</h5> --}}
                <p class="card-text"><b> - Email:</b> {{ $empresa->email }}</p>
                <p class="card-text"><b> - Teléfono:</b> {{ $empresa->telefono }}</p>
                <p class="card-text"><b> - Dirección:</b> {{ $empresa->direccion }}</p>
            </div>
        </div>
    </div>

    <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_APIKEY&callback=MostrarMapa">
    </script>

    @include('includes.footer')
@endsection

@php
$latitude = $empresa->latitud;
$longitude = $empresa->longitud;
@endphp

<script>
    function MostrarMapa() {
        var coord = {
            lat: {{ $latitude }},
            lng: {{ $longitude }}
        };
        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 10,
            center: coord
        });
        var marker = new google.maps.Marker({
            position: coord,
            map: map
        });
    }
</script>
