<html>
<head>
    <title>Lista de Tareas</title>
    <!-- En la carpeta public/ccs tengo la parte de css -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <div class="navbar">
        <div class="dropdown">
            <button class="dropbtn">Menu</button>
            <div class="dropdown-content">
                <a href="/">Inicio</a>
                <a href="/list">Lista Tareas</a>
                <a href="/task">Nueva Tarea</a>
                <a href="/search">Buscar</a>
            </div>
        </div>
    </div>
    <div class="content">
        @yield('content')
    </div>
</body>
</html>