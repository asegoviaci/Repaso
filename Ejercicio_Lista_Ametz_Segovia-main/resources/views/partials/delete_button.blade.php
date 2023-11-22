<form action="/tarea/{{ $tarea->id }}" method="post">
    @csrf
    @method('delete')
    <tr>
        <td>{{ $tarea->id }}</td>
         <td>{{ $tarea->nombre }}</td>
        <td>{{ $tarea->descripcion }}</td>
        <td>
            <button type="submit" id="borrar" >Borrar</button>
        </td>
    </tr>
</form>