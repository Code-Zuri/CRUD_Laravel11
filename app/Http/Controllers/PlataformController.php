<?php

namespace App\Http\Controllers;

use App\Models\Plataform;
use Illuminate\Http\Request;

class PlataformController extends Controller
{

    public function index()
    {
        $plataforms = Plataform::paginate(2);
        return view('modules.plataform.plata', compact('plataforms'));
        
    }


    public function create()
    {
        return view('modules.plataform.create');
    }


    public function store(Request $request)
    {
        $plataforms = new Plataform(); 
        $plataforms -> plataform = $request->post('plataforma');
        $plataforms -> fabric = $request->post('fabricante');
        $plataforms-> save();

        return redirect()->route('plataform.index')->with('success', 'Agregado');
    }

 
    public function  show($id)
    {
        $plataforms = Plataform::find($id);
        return view('modules.plataform.destroy', compact('plataforms'));
    }

    
    public function edit($id)
    {
        $plataforms = Plataform::find($id);
        return view('modules.plataform.edit', compact('plataforms'));
    }

    public function update(Request $request, $id)
    {
            // Buscar el registro existente
    $plataforms = Plataform::find($id);


    if (!$plataforms) {
        return redirect()->route('plataform.index')->with('error', 'Plataforma no encontrada');
    }

        $plataforms -> plataform = $request->post('plataforma');
        $plataforms -> fabric = $request->post('fabricante');
        $plataforms -> save();

        return redirect()->route('plataform.index')->with('success', 'Agregado');
    }


    public function destroy($id)
    {
        $plataforms = Plataform::find($id);
        $plataforms->delete();
        return redirect()->route('plataform.index')->with('success', 'Eliminado');
    }
}
