<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TareaController;
use App\Models\Tarea;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/*Route::get('/', function () {
    $tareas = Tarea::all();
    return view('tareas.index', compact('tareas'));
});

// Ruta para añadir nuevas tareas
Route::post('/tarea', function (Request $request) {
    $request->validate([
        'nombre' => 'required',
    ]);

    Tarea::create($request->all());

    return redirect('/');
});

// Ruta para eliminar tareas existentes
Route::delete('/tarea/{id}', function ($id) {
    Tarea::destroy($id);

    return redirect('/');
});*/

Route::get('/', [TareaController::class, 'index']);
Route::post('/tarea', [TareaController::class, 'store']);
Route::delete('/tarea/{id}', [TareaController::class, 'destroy']);
Route::get('/task', [TareaController::class, 'showTaskForm']);
Route::get('/list', [TareaController::class, 'showList']);
Route::get('/search', [TareaController::class, 'search']);
