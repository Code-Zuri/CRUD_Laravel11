<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;
use App\Http\Controllers\Dev;
class GameController extends Controller
{

    public function index()
{
   $datos = Game::paginate(2);
    return view('modules.dashboard.home', compact('datos'));
    
}



    public function create()
    {
        //Se crea los datos
        return view('modules.dashboard.create');
    }


    public function store(Request $request)
    {
        //Se gguardan los datos en la BD
        $games = new Game(); 
        $games-> name = $request->post('nombre');
        $games-> description = $request->post('descripcion');
        $games-> genere = $request->post('genero');
        $games-> plataform = $request->post('plataforma');
        $games-> price = $request->post('precio');
        $games-> developer = $request->post('desarrollador');
        $games-> save();

        return redirect()->route('game.index')->with('success', 'Agregado');
    }

    public function show($id)
    {
        //Se muestran los registros de la tabla
        $games = Game::find($id);
        return view('modules.dashboard.destroy', compact('games'));
       
    }

    public function edit($id)
    {
        //Se edita los datos de la BD
        $games = Game::find($id);
        return view('modules.dashboard.edit', compact('games'));
    }

    public function update(Request $request, $id)
    {
        //Se actualisan los datos de la BD
        $games = Game::find($id);
        $games-> name = $request->post('nombre');
        $games-> description = $request->post('descripcion');
        $games-> genere = $request->post('genero');
        $games-> plataform = $request->post('plataforma');
        $games-> price = $request->post('precio');
        $games-> developer = $request->post('desarrollador');
        $games-> save();

        return redirect()->route('game.index')->with('success', 'Editado');
    }


    public function destroy($id)
    {
        //Se eliminan/destruyen los datos en la BD
        $games = Game::find($id);
        $games->delete();
        return redirect()->route('game.index')->with('success', 'Eliminado');
    }
}
