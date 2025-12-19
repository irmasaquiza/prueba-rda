<?php

namespace App\Http\Controllers;

use App\Models\prestamo;
use App\Models\libro;
use App\Models\lector;
use Illuminate\Http\Request;
use Symfony\Component\Routing\Route;

class PrestamoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $prestamos = prestamo::all();
        return view('prestamos.index',compact('prestamos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $libros = libro::all();
        $lectors = lector::all();
        return view('prestamos.create', compact('libros','lectors'));
    }

    /**
     * Store a newly created resource in storage.
     */
public function store(Request $request)
{
    $request->validate([
        'libro_id' => 'required|exists:libros,id',
        'lector_id' => 'required|exists:lectors,id',
        'fecha_prestamo' => 'required|date|after_or_equal:today',
        'fecha_limite_devolucion' => 'required|date|after_or_equal:today|after_or_equal:fecha_prestamo',
    ], [
        'fecha_prestamo.after_or_equal' => 'La fecha de préstamo no puede ser anterior al día de hoy.',
        'fecha_limite_devolucion.after_or_equal' => 'La fecha límite de devolución no puede ser anterior al día de hoy.',
        'fecha_limite_devolucion.after' => 'La fecha límite debe ser posterior a la fecha de préstamo.',
    ]);

    prestamo::create($request->all());
    return redirect()->route('prestamos.index')
                     ->with('success', 'Préstamo creado exitosamente.');
}

    /**
     * Display the specified resource.
     */
    public function show(prestamo $prestamo)
    {
//
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(prestamo $prestamo)
    {
                $libros = libro::all();
        $lectors = lector::all();
        return view('prestamos.edit', compact('libros','lectors','prestamo'));
    }

    /**
     * Update the specified resource in storage.
     */
public function update(Request $request, prestamo $prestamo)
{
    $request->validate([
        'libro_id' => 'required|exists:libros,id',
        'lector_id' => 'required|exists:lectors,id',
        'fecha_prestamo' => 'required|date|after_or_equal:today',
        'fecha_limite_devolucion' => 'required|date|after_or_equal:today|after_or_equal:fecha_prestamo',
        'fecha_devolucion_real' => 'nullable|date',
        'estado' => 'required|in:prestado,devuelto,atrasado',
    ], [
        'fecha_prestamo.after_or_equal' => 'La fecha de préstamo no puede ser anterior al día de hoy.',
        'fecha_limite_devolucion.after_or_equal' => 'La fecha límite no puede ser anterior al día de hoy y debe ser igual o posterior a la fecha de préstamo.',
        'fecha_devolucion_real.after_or_equal' => 'La fecha de devolución real no puede ser anterior a la fecha de préstamo.',
    ]);

    $prestamo->update($request->all());
    return redirect()->route('prestamos.index')
                     ->with('success', 'Préstamo actualizado exitosamente.');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(prestamo $prestamo)
    {
        $prestamo->delete();
        return redirect()->route('prestamos.index')
                         ->with('success', 'Préstamo eliminado exitosamente.');
    }
}
