<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    public function index(){
        return view("modules/auth/login");
    }
    
    public function registro(){
        return view("modules/auth/registro");
    }

    public function registrar(Request $request){
        $item = new User();
        $item->name = $request->name;
        $item->email = $request->email;
        $item->password = Hash::make($request->password);
        $item->save();

        return to_route('login');    
    }

    public function logear(Request $request){
        $credenciales = [
            'email'=>$request->email,
            'password'=>$request->password

        ];

        if(Auth::attempt($credenciales)){
            return to_route('modules.dashboard.home');
        }else{
            return to_route('login');
        }
    }

    public function logout(){
        Auth::logout();
        return  to_route('login');
    }    

    public function home(){
        return view('modules/dashboard/home');
    }
}
