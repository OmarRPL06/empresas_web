@extends('layouts.base')
@section('contenido')

    <nav aria-label="breadcrumb" class="margin-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Inicio</a></li>
            <li class="breadcrumb-item active" aria-current="page">Detalles de envío</li>
        </ol>
    </nav>

    @php

    $api_key = ''; // API Key Google Maps

    // $find = urlencode(trim("Calle Jersualen #74, Comunidad Lazaro Cardenas, Municipio de Yajalón, Chiapas, CP 29930"));
    $find = urlencode(trim($calle . " #" . $num_calle . ", " . $colonia . ", " . $ciudad . ", Municipio de " . $municipio . ", " . $estado . ", CP " . $c_postal));

    // Webservices
    $google_maps_url = 'https://maps.googleapis.com/maps/api/geocode/json?address=' . $find . '&key=' . $api_key;
    $google_maps_json = file_get_contents($google_maps_url);
    $google_maps_array = json_decode($google_maps_json, true);

    // Get Location
    $latitude = $google_maps_array['results'][0]['geometry']['location']['lat'];
    $longitude = $google_maps_array['results'][0]['geometry']['location']['lng'];
    // $formatted_address = $google_maps_array['results'][0]['formatted_address'];

    $respuesta = file_get_contents('https://maps.googleapis.com/maps/api/directions/json?key='. $api_key . '&origin=16.8958594,-92.067273717&destination=' . $latitude . ',' . $longitude . '&mode=driving');
    $json = json_decode($respuesta);

    $distancia = $json->{"routes"}[0]->{"legs"}[0]->{"distance"}->{"text"};
    $duracion = $json->{"routes"}[0]->{"legs"}[0]->{"duration"}->{"text"};
    // $resumen = $json->{"routes"}[0]->{"summary"};
    @endphp

    <div class="container-map">
        <div class="row justify-content-center align-items-center">
            <div class="col-lg-4 col-10 order-lg-1 order-2">
                <div class="card sombra">
                    <div class="card-header">
                        <h3 class="card-title">Detalles del envío:</h3>
                        <hr>
                        <p><b>ORIGEN DEL ENVÍO: </b>{{ $calle . " #" . $num_calle . ", " . $colonia . ", " . $ciudad . ", Municipio de " . $municipio . ", " . $estado . ", CP: " . $c_postal }}.</p>
                        <hr>
                        <p><b>DESTINO: </b>Universidad Tecnológica de la Selva, Entronque Toniná Km. 0.5 Carretera Ocosingo-Altamirano, Ocosingo, Chiapas, México. C.P. 29950.</p>
                    </div>
                    <div class="card-body">
                        <blockquote class="blockquote mb-0">
                            <p><strong>Distancia: </strong>{{ $distancia }}</p>
                            <p><strong>Duración: </strong>{{ $duracion }}</p>
                            @php
                                $distancia_real = str_replace(',','',substr($distancia, 0, -3));
                            @endphp
                            <!-- @if ($distancia_real > 0 and $distancia_real <= 100)
                                <p><strong>Costo de envío:</strong> $100.00 Pesos</p>
                            @elseif ($distancia_real > 100 and $distancia_real <= 200)
                                <p><strong>Costo de envío:</strong> $130.00 Pesos</p>
                            @elseif ($distancia_real > 200 and $distancia_real <= 400)
                                <p><strong>Costo de envío:</strong> $170.00 Pesos</p>
                            @elseif ($distancia_real > 400 and $distancia_real <= 700)
                                <p><strong>Costo de envío:</strong> $210.00 Pesos</p>
                            @elseif ($distancia_real > 700 and $distancia_real <= 1000)
                                <p><strong>Costo de envío:</strong> $250.00 Pesos</p>
                            @elseif ($distancia_real > 1000)
                                <p><strong>Costo de envío:</strong> $350.00 Pesos</p>
                            @endif -->

                            @if ($distancia_real <= 100)
                                <p><strong>Costo de envío:</strong> $100.00 Pesos</p>
                            @elseif ($distancia_real <= 200)
                                <p><strong>Costo de envío:</strong> $130.00 Pesos</p>
                            @elseif ($distancia_real <= 400)
                                <p><strong>Costo de envío:</strong> $170.00 Pesos</p>
                            @elseif ($distancia_real <= 700)
                                <p><strong>Costo de envío:</strong> $210.00 Pesos</p>
                            @elseif ($distancia_real <= 1000)
                                <p><strong>Costo de envío:</strong> $250.00 Pesos</p>
                            @elseif ($distancia_real > 1000)
                                <p><strong>Costo de envío:</strong> $350.00 Pesos</p>
                            @endif

                            <footer class="blockquote-footer">Modo <cite title="Source Title" class="parpadeo">driving</cite>
                            </footer>
                        </blockquote>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-10 order-lg-2 order-1">
                <iframe class="sombra" width="100%" height="450" frameborder="0" style="border:0"
                    src="https://www.google.com/maps/embed/v1/directions?key=[-------]&origin=16.8958594,-92.067273717&destination={{ $latitude }},{{ $longitude }}&mode=driving"
                    allowfullscreen></iframe>
                <br class="d-lg-none d-block"><br class="d-lg-none d-block">
            </div>
        </div>
    </div>

    @include('includes.footer')
@endsection

<script src="/gmaps/gmaps.min.js"></script>
<script type="text/javascript">
    var map;
    $(document).ready(function() {
        map = new GMaps({
            div: '#map',
            lat: {{ $latitude }},
            lng: {{ $longitude }},
            zoom: 16,
            mapTypeId: google.maps.MapTypeId.HYBRID
        });

        map.addMarker({
            lat: {{ $latitude }},
            lng: {{ $longitude }}

        });
    });
</script>
