@extends('layout.layout')
@section('titulo','Medicos')
@section('contenido')
<div id="medicos" class="container">
      <button class="btn btn-warning" v-on:click="showModal()">Agregar Medico</button>
      <br>
          <input type="text" placeholder="ESCRIBA EL NOMBRE DEl medico" class="form-control"
     v-model="buscar">
     
      <br>
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
                <input type="text" placeholder="Apellido Materno" class="form-control" v-model="nivel_estudio">
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
              <button class="btn btn-success" v-on:click="updateMedicos(cedula)">GUARDAR</button>
            </div>
            <br>
            <div class="col-4">
              <button class="btn btn-warning" v-on:click="editando=false">CANCELAR</button>

            </div>
          </div>
      </div>
      <div class="row">
        <div class="col-md-9" v-if="editando==false">
          <table class="table table-bordered">
            <thead>
            <th>cedula</th>
              <th>Nombre</th>
              <th>apellido paterno</th>
              <th>nivel de estudio</th>
            </thead>
            <tbody>
              <tr v-for="med in filtroMedicos">
                <td>@{{med.cedula}}</td>
                <td>@{{med.nombre}}</td>
                <td>@{{med.apellidop}}</td>
                <td>@{{med.nivel_estudio}}</td>
                <td>
                  <span class="btn btn-success" v-on:click="showMedicos(med.cedula)"></span>
                  <span class=" btn btn-danger" v-on:click="eliminarMedico(med.cedula)"></span>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>

    <div class="modal fade" tabindex="-1" role="dialog" id="add_medicos">
       <div class="modal-dialog" role="document">
      <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria.label="close"><span
                                        aria-hidden="true">x</span></button>
        <h4 class="modal-title">Alumno Nuevo</h4>
        </div>
      <div class="modal-body">
        <input type="text" name="" placeholder="Matricula" class="form-control" v-model="cedula">
        <input type="text" name="" placeholder="nombre" class="form-control" v-model="nombre">
        <input type="text" name="" placeholder="Apellido Paterno" class="form-control" v-model="apellidop">
        <input type="text" name="" placeholder="Apellido Materno" class="form-control" v-model="apellidom">
        <input type="text" name="" placeholder="estudios" class="form-control" v-model="nivel_estudio">
<!--         <select class="form-control" v-model="idcarrera">
          <option disabled value="">Elija La Carrera</option>
          <option v-for="carrera in carreras" v-bind:value="carrera.idcarrera">@{{carrera.nombre}}</option>
        </select> -->

      </div>
      <div class="modal-footer">
        <!-- comprobar que funcione en la caja de texto -->
        <h6>Matricula : @{{ cedula }}</h6>
        <h6>Nombre : @{{ nombre }}</h6>
        <h6>ApellidoP : @{{ apellidop }}</h6>
        <h6>ApellidoM : @{{ apellidom }}</h6>
        <h6>idCarrera : @{{ nivel_estudio }}</h6>
        <!-- fin -->

          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary" v-on:click="agregarMedico()">Guardar</button>
      </div>
      </div><!-- /.modal-content -->
       </div><!-- /.modal-dialog -->
</div>
 </div>
@endsection
@push('scripts')

<script src="js/vue-resource.js"></script>
<script src="js/medicos/medicos.js"></script>


@endpush