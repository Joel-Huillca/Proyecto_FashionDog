<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class HabilitarUsuarioController extends Controller
{
    public function index(){
        $usuarios = User::where('rol',"!=", 'administrativo')->simplePaginate(10);
        return view('administrador.usuario.index')->with('users',$usuarios);
    }


    public function updateStatus($request)
    {
        $usuario = User::where('id', $request)->get()->first();
        if ($usuario->status === 0) {
            $usuario->status = 1;
            $usuario->save();
            return redirect('/usuario');
        }else {
            $usuario->status = 0;
            $usuario->save();
            return redirect('/usuario');
        }
    }
}
