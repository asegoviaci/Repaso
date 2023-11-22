<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tarea;

class TareaController extends Controller
{
    public function index()
    {
        $tareas = Tarea::all();
        return view('tareas.index')->with('tareas', $tareas);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string',
            'descripcion' => 'required|string',
        ],[
            'nombre.required' => 'El campo nombre es obligatorio.',
            'descripcion.required' => 'El campo descripción es obligatorio.',
            'descripcion.string' => 'El campo descripción debe ser una cadena.',
        ]);

        Tarea::create($request->all());

        return redirect('/');
    }

    public function destroy($id)
    {
        Tarea::destroy($id);

        return redirect('/');
    }

    public function showTaskForm()
    {
        return view('tareas.task_form');
    }

    public function showList()
    {
        $tareas = Tarea::all();
        return view('tareas.List')->with('tareas', $tareas);
    }

    public function search(Request $request)
    {
        $searchTerm = $request->input('search');
        $tareas = Tarea::where('nombre', 'like', '%' . $searchTerm . '%')->get();

        return view('tareas.search')->with('tareas', $tareas);
    }
}
