<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Medicamentos;

class ApiMedicamentosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return Medicamentos::all();
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
        $medicina = new Medicamentos;
        $medicina->clave_medicamento=$request->get('clave_medicamento');
        $medicina->nombre=$request->get('nombre');
        $medicina->fecha_caducidad=$request->get('fecha_caducidad');
        $medicina->tipo=$request->get('tipo');
        // $medico->sintoma=$request->get('sintoma');
        
        $medicina->save();
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
        $medicina=Medicamentos::find($id);
        return $medicina;
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
        $medicamentos=Medicamentos::find($id);
        $medicamentos->clave_medicamento=$request->get('clave_medicamento');
        $medicamentos->nombre=$request->get('nombre');
        $medicamentos->fecha_caducidad=$request->get('fecha_caducidad');
        $medicamentos->tipo=$request->get('tipo');
        $medicamentos->update();
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
        return Medicamentos::destroy($id);
    }
}
