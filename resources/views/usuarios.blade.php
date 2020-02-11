@extends('layout.usermaster')
@section('titulo','Usuarios') 

@section('contenido')
<div id="usuarios" class="container">
<!--       <br>
      <button class="btn btn-warning" v-on:click="editando=true">Agregar auto</button>
      <br>
      <br>
 -->      <!-- PROBAR QUE FUNCIONA EL JSON CON LO COMENTADO ABAJO -->
      <div class="row" v-if="editando==true" >
        <div class="col-md-3">
          <form>
            <div class="form-row">
              <div class="col-5">
                <input type="text" placeholder="Escriba su primer nombre" class="form-control" v-model="nombre" >
              </div>
              <br>
              <div class="col-4">
                <input type="text" placeholder="Apellido Paterno" class="form-control" v-model="apellidop">
              </div>
              <br>
              <div class="col-4">
                <input type="text" placeholder="Apellido Materno" class="form-control" v-model="apellidom">
              </div>
            </div>
            <br>
<!--             <div class="form-row">
              <div class="col-4">
                <input type="text" placeholder="Escriba su direccion" class="form-control" >
              </div>
              <div class="col-4">
                <input type="text" placeholder="Escriba su Localidad" class="form-control"  >
              </div>
              <div class="col-2">
                <input type="number" placeholder="edad" class="form-control"  >
              </div>
            </div> -->
            <br>
<!--             <div class="form-row">
              <div class="col-5">
                <input type="text" placeholder="Escriba su celular" class="form-control" >
              </div>
              <div class="col-5">
                <input type="text" placeholder="Escriba su Correo" class="form-control"  >
              </div>
            </div> -->
            <br>
          </form> 
          <br>
          <br>
        </div>
            <div class="row">
            <div class="col-4">
              <button class="btn btn-success" v-on:click="updateUsuario(clave_usuario)">GUARDAR</button>
            </div>
            <br>
            <div class="col-4">
              <button class="btn btn-warning" v-on:click="editando=false">CANCELAR</button>

            </div>
          </div>
      </div>
      <!-- @{{usuarios}} -->
      
      <!-- {{Session::get('ape')}}; -->
      <div class="row" v-if="editando==false">
        <div class="col-md-9" class="col-xs-6">
          <table class="table table-bordered">
            <thead>
            <th>N°usuario</th>
              <th>Nombre de usuario</th>
              <th>Apellido Paterno</th>
              <th>Apellido Materno</th>
            </thead>
            <tbody>
              <tr v-for="usu in usuarios">
                <td>@{{usu.clave_usuario}}</td>
                <td>@{{usu.nombre}}</td>
                <td>@{{usu.apellidop}}</td>
                <td>@{{usu.apellidom}}</td>
                <td>
                  <span class="fa fa-pencil btn btn-xs btn-primary" v-on:click="showUsuario(usu.clave_usuario)"></span>
                  <span class="fa fa-trash btn btn-xs btn-danger" v-on:click="eliminarUsuario(usu.nick)"></span>
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
<script src="js/usuarios/usuarios.js"></script>
<!-- <script type="js/jquery-3.3.1.min.js"></script>
<script type="js/jquery.min.js"></script> -->
@endpush
<input type="hidden" name="route" value="{{url('/')}}">