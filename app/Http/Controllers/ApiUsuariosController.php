<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usuarios;

class ApiUsuariosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return Usuarios::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $user = new Usuarios;
        $user->clave_usuario=$request->get('clave_usuario');
        $user->id_rol=$request->get('id_rol');
        $user->nombre=$request->get('nombre');
        $user->apellidop=$request->get('apellidop');
        $user->apellidom=$request->get('apellidom');
        $user->user=$request->get('user');
        $user->contraseña=$request->get('contraseña');
        // $medico->sintoma=$request->get('sintoma');
        $foto=$request->file('foto');

        $nombre_foto=$request->get('nombre');
        $user->foto=$nombre_foto.'.jpg';


        if($foto!=null)
        {
            $foto->move(public_path().'/imagenes/usuarios/',$nombre_foto.'.jpg');
            
        }
        
        $user->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        return Usuarios::find($id);
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
        //
        $usuarios=Usuarios::find($id);
        $usuarios->clave_usuario=$request->get('clave_usuario');
        $usuarios->nombre=$request->get('nombre');
        $usuarios->apellidop=$request->get('apellidop');
        $usuarios->apellidom=$request->get('apellidom');
        $usuarios->update();
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
        return Usuarios::destroy($id);
    }
}
