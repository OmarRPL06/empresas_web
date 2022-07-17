@extends('layouts.base')
@section('contenido')
    <div class="container-tittle">
        <h3>Bienvenido, Calcula el costo de tu envío</h3>
    </div>
    <div class="container-card">
        <div class="card">
            <div class="container-form">
                <form class="row g-3" action="{{ route('registrar.cliente') }}" method="POST">
                    @csrf
                    @if (count($errors) > 0)
                        <div class="alert alert-danger" role="alert">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li> -> {!! $error !!}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="col-12">
                        <label for="" class="form-label">Nombre Completo:</label>
                        <input type="text" class="form-control" id="" name="nombres"
                            placeholder="Ingrese su nombre completo con apellidos..." required
                            pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]{2,100}" title="Solo se aceptan letras.">
                    </div>
                    <div class="col-md-7">
                        <label for="" class="form-label">Correo Electronico:</label>
                        <input type="email" class="form-control" id="" name="email"
                            placeholder="Ingrese su correo electrónico..." required>
                    </div>
                    <div class="col-md-5">
                        <label for="" class="form-label">Numero de Teléfono:</label>
                        <input type="text" class="form-control" id="" name="telefono"
                            placeholder="Ingrese su numero de telefono..." required pattern="[0-9]{10,10}"
                            title="Debe de contener 10 digitos y solo numeros">
                    </div>
                    <div class="col-7">
                        <label for="" class="form-label">Calle:</label>
                        <input type="text" class="form-control" id="" name="calle"
                            placeholder="Ingrese el nombre de la calle en que vive..." required
                            pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ0-9\s]{1,254}" title="Solo Letras y numeros">
                    </div>
                    <div class="col-5">
                        <label for="" class="form-label">N° de Calle:</label>
                        <input type="text" class="form-control" id="" name="num_calle"
                            placeholder="Ingrese el numero de la calle..." required pattern="[0-9]{1,50}"
                            title="Solo se aceptan numeros">
                    </div>
                    <div class="col-md-6">
                        <label for="" class="form-label">Colonia:</label>
                        <input type="text" class="form-control" id="" name="colonia"
                            placeholder="Ingrese la colonia de donde vive..." required
                            pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ0-9\s]{1,254}" title="Solo Letras y numeros">
                    </div>
                    <div class="col-md-3">
                        <label for="" class="form-label">Ciudad:</label>
                        <input type="text" class="form-control" id="" name="ciudad"
                            placeholder="Ingrese la ciudad de donde vive..." required
                             title="Solo Letras y numeros">
                    </div>
                    <div class="col-md-3">
                        <label for="" class="form-label">Municipio:</label>
                        <input type="text" class="form-control" id="" name="municipio"
                            placeholder="Ingrese el Municipio..." required pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ0-9\s]{1,254}"
                            title="Solo Letras y numeros">
                    </div>
                    <div class="col-md-3">
                        <label for="" class="form-label">Estado:</label>
                        <input type="text" class="form-control" id="" name="estado"
                            placeholder="Ingrese el Estado..." required pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]{1,254}"
                            title="Solo Letras">
                    </div>
                    <div class="col-md-2">
                        <label for="" class="form-label">Codigo Postal:</label>
                        <input type="text" class="form-control" id="" name="c_postal"
                            placeholder="Ejemplo: 29950" required pattern="[0-9]{1,50}" title="Solo se aceptan numeros">
                    </div>
                    <div class="col-12">
                        <center>
                            <button type="submit" class="btn btn-primary">Calcular Envío</button>
                        </center>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @include('includes.footer')
@endsection
