<form action="/tarea" method="post">
    @csrf
    <label for="nombre">Nombre de la tarea:</label>
    @error('nombre')
        <div class="error">{{ $message }}</div>
    @enderror
    <input type="text" name="nombre" value="{{ old('nombre') }}">
    <label for="descripcion">Descripción:</label>
    @error('descripcion')
        <div class="error">{{ $message }}</div>
    @enderror
    <input type="text" name="descripcion" value="{{ old('descripcion') }}">
    <button type="submit">Agregar tarea</button>
</form>