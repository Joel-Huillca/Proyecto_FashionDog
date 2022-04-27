<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class EstilistaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $estilistas = User::where('rol', 'estilista')->get();
        return view("administrador.estilista.index")->with("estilistas",$estilistas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("administrador.estilista.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'rut' => ['required', 'string', 'unique:users'],
        ]);

        //crear contraseña aleatoria
        $aleatorio = "123456";

        User::create([
            'nombre' => $request['nombre'],
            'apellido_paterno' => $request['apellido_paterno'],
            'telefono_movil' => $request['telefono_movil'],
            'direccion' => "0",
            'rut' => $request['rut'],
            'email' => $request['email'],
            'password' => Hash::make($aleatorio),
            'rol' => "estilista",
        ]);

        $estilistas = User::where('rol', 'estilista')->get();

        return view('administrador.estilista.index')->with("estilistaCreado",true)->with("estilistas",$estilistas);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::where('id', $id)->FirstOrFail();
        return view('administrador.estilista.edit')->with('estilista',$user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::where('id', $id)->FirstOrFail();

        $user->nombre = $request->nombre;
        $user->email = $request->email;
        $user->apellido_paterno = $request->apellido_paterno;
        $user->telefono_movil = $request->telefono_movil;

        $user->save();

        $estilistas = User::where('rol', 'estilista')->get();
        return view('administrador.estilista.index')->with("estilistaEditado",true)->with("estilistas",$estilistas);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
