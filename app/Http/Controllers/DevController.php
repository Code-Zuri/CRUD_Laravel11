<?php

namespace App\Http\Controllers;

use App\Models\Dev;
use Illuminate\Http\Request;

class DevController extends Controller
{

    public function index()
    {
        $dev = Dev::paginate(2);
        return view('modules.developer.deve', compact('dev'));
       
    }

 
    public function create()
    {
        return view('modules.developer.create');
    }

  
    public function store(Request $request)
    {
        $dev = new Dev(); 
        $dev-> name_dev = $request->post('nombre');
        $dev-> country = $request->post('ciudad');
        $dev-> website = $request->post('sitioweb');
        $dev-> save();

        return redirect()->route('developer.index')->with('success', 'Agregado');
    }

    public function show($id)
    {
        $dev = Dev::find($id);
        return view('modules.developer.destroy', compact('dev'));
    }

    public function edit($id)
    {
        $dev = Dev::find($id);
        return view('modules.developer.edit', compact('dev'));
    }


    public function update(Request $request, $id)
    {
            // Buscar el registro existente
    $dev = Dev::find($id);

    // Si no se encuentra el registro, puedes manejar el error
    if (!$dev) {
        return redirect()->route('developer.index')->with('error', 'Desarrollador no encontrado');
    }

        $dev-> name_dev = $request->post('nombre');
        $dev-> country = $request->post('ciudad');
        $dev-> website = $request->post('sitioweb');
        $dev-> save();

        return redirect()->route('developer.index')->with('success', 'Agregado');
    }

 
    public function destroy($id)
    {
        $dev = Dev::find($id);
        $dev->delete();
        return redirect()->route('developer.index')->with('success', 'Eliminado');
    }
}
