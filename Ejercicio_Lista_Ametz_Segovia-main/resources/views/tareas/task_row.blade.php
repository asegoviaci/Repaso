<tr>
    <td>{{ $tarea->id }}</td>
    <td>{{ $tarea->nombre }}</td>
    <td>
        @include('partials.delete_button', ['tarea' => $tarea])
    </td>
</tr>