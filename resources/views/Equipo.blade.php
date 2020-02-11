@extends('layout.layout')
@section('titulo','Equipo Medico')
@section('contenido')
<div id="equipo" class="container">

      <div class="row">
        <div class="col-md-9">
          <table class="table table-bordered">
            <thead>
            <th>clave</th>
              <th>Nombre de Equipo</th>
              <th>unidades</th>
              <th>especializacion</th>
            </thead>
            <tbody>
              <tr v-for="equ in equipo">
                <td>@{{equ.id_material}}</td>
                <td>@{{equ.nombre}}</td>
                <td>@{{equ.unidades}}</td>
                <td>@{{equ.especializacion}}</td>
                <td>
                  <span class="glyphicon glyphicon-pencil btn btn-xs btn-primary" v-on:click="showUsuario(usu.nick)"></span>
                  <span class="glyphicon glyphicon-trash btn btn-xs btn-danger" v-on:click="eliminarUsuario(usu.nick)"></span>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
 </div>
@endsection    
@push('scripts')
<!-- <script src="js/bootstrap.min.js"></script> -->
<script src="js/vue-resource.js"></script>
<script src="js/equipo/equipo.js"></script>
<!-- <script type="js/jquery-3.3.1.min.js"></script>
<script type="js/jquery.min.js"></script> -->
@endpush
<input type="hidden" name="route" value="{{url('/')}}">