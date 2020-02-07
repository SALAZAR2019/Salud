<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usuarios;
use Session;
use Redirect;
use Cache;
use Cookie;

class AccesoController extends Controller
{
      public function validar(Request $request){
        // return 'HOLA';

        // return Usuario::all();
        $user=$request->user;
        $contraseña=$request->contraseña;

        $resp= Usuarios::where('user', '=',$user)
        ->where('contraseña','=', $contraseña)
        ->get();
       

        // return $resp;
        if (count($resp)>0){

             $user =$resp[0]->nombre.' '.$resp[0]->apellidop;

            Session::put('usuario',$user);
            Session::put('rol',$resp[0]->rol->rol);
            Session::put('foto',$resp[0]->foto);
            Session::put('ape',$resp[0]->clave_usuario);

            if($resp[0]->rol->rol=="usuario")
              return Redirect::to('equipo');
            elseif ($resp[0]->rol->rol=="medico")
                return Redirect::to('medicos');
            elseif ($resp[0]->rol->rol=="personal")
                return Redirect::to('usuarios');
            }

            else
                return Redirect::to('usuarios');
            
    }

    public function salir(){
        Session::flush();
        Session::reflash();
        Cache::flush();
        Cookie::forget('laravel_session');
        unset($_COOKIE);
        unset($_SESSION);

        return Redirect::to('inicio');
    }
}