<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
 
    public function index()
    {
        $profile= Profile::all();
        return view('modules.user.profile', compact('profile'));
    }


    public function create()
    {
        return view('modules.user.create');
    }

    public function store(Request $request)
    {

        
        $profile = new Profile(); 
        $profile -> name = $request->post('nombre');
        $profile -> email = $request->post('email');
        $profile->password = Hash::make($request->post('password'));
        $profile -> rol = $request->post('rol');
        $profile-> save();

        return redirect()->route('profile.index')->with('success', 'Agregado');
    
    }


    public function show($id)
    {
        $profile= Profile::find($id);
        return view('modules.user.destroy', compact('profile'));
    }

    public function edit($id)
    {
        $profile= Profile::find($id);
        return view('modules.user.edit', compact('profile'));
    }


    public function update(Request $request, $id)
    {
                // Buscar el registro existente
    $profile = Profile::find($id);


    if (!$profile) {
        return redirect()->route('profile.index')->with('error', 'Usuario no encontrada');
    }

        $profile -> name = $request->post('nombre');
        $profile -> email = $request->post('email');
        $profile -> rol = $request->post('rol');
        $profile -> save();

        return redirect()->route('profile.index')->with('success', 'Agregado');
    }



    public function destroy($id)
    {
        $profile = Profile::find($id);
        $profile->delete();
        return redirect()->route('profile.index')->with('success', 'Eliminado');
    }
}
