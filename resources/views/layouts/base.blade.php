<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Empresas UTS</title>
    <link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/bootstrap/css/omar.css">

    <script src="/bootstrap/js/jquery-3.6.0.min.js"></script>
    <script src="/bootstrap/js/bootstrap.min.js"></script>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a href="{{ url('/') }}" class="logo"><img src="/img/logo.png" alt="" width="30" height="30"></a>
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ url('/') }}">Empresas UTS</a>
            <div class="d-flex">
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Empresas +
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><button type="button" class="dropdown-item" data-bs-toggle="modal"
                                        data-bs-target="#windowModal">Registrar</button></li>
                                <li><a class="dropdown-item" href="{{ url('/') }}">Consultar</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <form class="d-flex margin-auto">
                    <input class="form-control me-2 input-search" type="search" placeholder="Buscar..." aria-label="Search">
                    &nbsp
                    <button class="btn btn-outline-success btn-sm btn-search" type="submit">Buscar</button>
                </form>
            </div>
        </div>
    </nav>

    @yield('contenido')

</body>

</html>
