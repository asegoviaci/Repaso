<!-- resources/views/tareas/index.blade.php -->

@extends('layout')

@section('content')
    <h1>Lista de Tareas</h1>

    <!-- Formulario para crear nueva tarea -->
    @include('partials.form')

    <!-- Tabla para mostrar tareas -->
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

