<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Medicos;

class ApiMedicosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $id=Session::get('ape');
        // return $usuario = Usuarios::
        // where('id_rol','=',1)
        // ->get();

        //
        return Medicos::all();

        // $medicos=DB::table('usuarios')->all()
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
        $medico = new Medicos;
        $medico->cedula=$request->get('cedula');
        $medico->nombre=$request->get('nombre');
        $medico->apellidop=$request->get('apellidop');
        $medico->apellidom=$request->get('apellidom');
        $medico->nivel_estudio=$request->get('nivel_estudio');
        // $medico->sintoma=$request->get('sintoma');
        
        $medico->save();
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
        $medico=Medicos::find($id);
        return $medico;
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
        $medico=Medicos::find($id);

        $medico->cedula=$request->get('cedula');
        $medico->nombre=$request->get('nombre');
        $medico->apellidop=$request->get('apellidop');
        $medico->apellidom=$request->get('apellidom');
        $medico->nivel_estudio=$request->get('nivel_estudio');
        
        $medico->update();
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
        return Medicos::destroy($id);
    }
}
