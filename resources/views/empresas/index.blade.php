@extends('layouts.base')
@section('contenido')
    <div class="container-tittle">
        <h3><i>Empresas Registradas</i></h3>
    </div>
    <div class="container-card">
        <div class="card">
            <div class="container-form">
                <div id="message">
                    @if (session('success'))
                        <div class="alert alert-success text-center" role="alert">{{ session('success') }}</div>
                    @endif
                </div>
                @if (count($errors) > 0)
                    <div class="alert alert-danger" role="alert">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li> -> {!! $error !!}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <p class="inline fw-normal p-table text-muted">Lista de empresas registradas, ordenada alfabéticamente por nombre.</p>
                <button type="button" class="btn btn-success btn-sm right" data-bs-toggle="modal"
                    data-bs-target="#windowModal">Registrar +</button>
                {{-- <div class="table-responsive"> --}}
                    <table class="table table-hover table-top">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Empresa</th>
                                {{-- <th scope="col">Nombre</th> --}}
                                {{-- <th scope="col">Email</th> --}}
                                {{-- <th scope="col">Teléfono</th> --}}
                                {{-- <th scope="col">Dirección</th> --}}
                                <th scope="col" class="text-center">Ver detalles</th>
                            </tr>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($empresas as $empresa)
                                <tr>
                                    <th scope="row">{{ $empresa->idEmpresa }}</th>
                                    <td>{{ $empresa->nombre }}</td>
                                    {{-- <td>{{ $empresa->email }}</td> --}}
                                    {{-- <td>{{ $empresa->telefono }}</td> --}}
                                    {{-- <td>{{ $empresa->direccion }}</td> --}}
                                    <td class="text-center icon-gps">
                                        <a href="{{ url("/mapa/$empresa->idEmpresa") }}">
                                            <img src="/img/detalles.png" height="25px" width="25px">
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                {{-- </div> --}}
            </div>
        </div>
    </div>
    <div class="modal fade" id="windowModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><i>Registrar Nueva Empresa</i></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('registrar.empresa') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <label class="form-label label-title">Nombre de la empresa*:</label>
                        <input type="text" class="form-control form-placeholder" title="Ingresa el nombre de la empresa"
                            name="nombre" placeholder="Ingresa el nombre de la empresa..." required>
                        <label class="form-label label-title">Correo Electrónico*:</label>
                        <input type="email" class="form-control form-placeholder" title="Ingresa el correo electrónico"
                            name="email" placeholder="Ingresa el correo electrónico..." required>
                        <label class="form-label label-title">Teléfono*:</label>
                        <input type="text" class="form-control form-placeholder" title="Ingresa el numero de teléfono"
                            name="telefono" placeholder="Ingresa el numero de teléfono..." required>
                        <label class="form-label label-title">Dirección*:</label>
                        <textarea class="form-control form-placeholder" name="direccion" rows="3"
                            title="Escribe la dirección completa para su ver la ubicación"
                            placeholder="Escribe la dirección completa para su ver la ubicación..." required></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success btn-sm">Registrar</button>
                        <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal">Cancelar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @include('includes.footer')
@endsection

<script type="text/javascript">
    function borrar() {
        $("#message").load(" #message");
    }

    setInterval(function() {
        borrar();
    }, 3000);
</script>
