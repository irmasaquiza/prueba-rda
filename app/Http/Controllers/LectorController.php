<?php

namespace App\Http\Controllers;

use App\Models\lector;
use Illuminate\Http\Request;

class LectorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lectors = lector::all()->where('activo', true);
        return view('lectors.index', compact('lectors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    return view('lectors.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'email' => 'required|email',
            'telefono' => 'required',
        ]);

        lector::create(
            $request->only('nombre', 'email', 'telefono','direccion')
        );

        return redirect()->route('lectors.index')->with('success', 'Lector creado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(lector $lector)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(lector $lector)
    {
        return view('lectors.edit', compact('lector'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, lector $lector)
    {
        $request->validate([
            'nombre' => 'required',
            'email' => 'required|email',
            'telefono' => 'required',
        ]);

        $lector->update(
            $request->only('nombre', 'email', 'telefono','direccion')
        );

        return redirect()->route('lectors.index')->with('success', 'Lector actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(lector $lector)
    {
        $lector->activo = false;
        $lector->save();
        return redirect()->route('lectors.index')->with('success', 'Lector eliminado correctamente.');
    }
}
