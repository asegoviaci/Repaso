@extends('layout')

@section('content')
    <h1>Búsqueda de Tareas</h1>
    <form action="/search" method="get">
        <label for="search">Buscar tarea:</label>
        <input type="text" name="search">
        <button type="submit">Buscar</button>
    </form>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @each('partials.delete_button', $tareas, 'tarea')
        </tbody>
    </table>
@endsection