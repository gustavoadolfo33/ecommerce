<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Family;
use Illuminate\Http\Request;

class FamilyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $families = Family::orderBy('id', 'desc')->
        paginate(10);
        return view('admin.families.index', compact('families'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.families.create');
    }

    /**
     * Store a newly created resource in storage.
     */
public function store(Request $request)
{
    $request->validate([
        'name' => 'required'
    ]);

    // Verifica si ya existe una familia con ese nombre
    $exists = Family::where('name', $request->name)->exists();

    if ($exists) {
        session()->flash('swal', [
            'icon' => 'error',
            'text' => 'Ya hay una familia con el mismo nombre, cambie el nombre...'
        ]);
        return redirect()->back();
    } 

    // Si no existe, la crea
    Family::create([
        'name' => $request->name
    ]);

    session()->flash('swal', [
        'icon' => 'success',
        'text' => 'Familia creada correctamente...'
    ]);

    return redirect()->route('admin.families.index');
}

    /**
     * Display the specified resource.
     */
    public function show(Family $family)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Family $family)
    {
        return view('admin.families.edit', compact('family'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Family $family)
    {
        $request->validate([
            'name' => 'required'
        ]);
        $family->update($request->all());

        session()->flash('swal', [
            'icon' => 'success',
            'title' => 'actualizado!',
            'text' => 'Familia actualizada corrctamente...'
        ]);

        return redirect()->route('admin.families.index', $family);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Family $family)
    {
        if ($family->categories->count() > 0) {

            session()->flash('swal', [
            'icon' => 'error',
            'title' => 'Ups!',
            'text' => 'No sew puede eliminar esta familia por que tiene categorias asociadas...'
            ]);
            return redirect()->route('admin.families.edit', $family);
        }
        $family->delete();
        session()->flash('swal', [
            'icon' => 'success',
            'title' => 'Eliminado!!',
            'text' => 'Familia eliminada correctamente...'
        ]);

        return redirect()->route('admin.families.index');
    }
}
