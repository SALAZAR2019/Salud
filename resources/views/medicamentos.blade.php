@extends('layout.layout')
@section('titulo','medicamentos')
@section('contenido')
<div id="medicamentos" class="container">
      <button class="btn btn-warning" v-on:click="showModal()">AGREGAR MEDICAMENTO</button>
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
                <input type="date" placeholder="Apellido Paterno" class="form-control" v-model="fecha_caducidad">
              </div>
              <br>
              <div class="col-4">
                <input type="text" placeholder="Apellido Materno" class="form-control" v-model="tipo">
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
              <button class="btn btn-success" v-on:click="updateMedicamento(clave_medicamento)">GUARDAR</button>
            </div>
            <br>
            <div class="col-4">
              <button class="btn btn-warning" v-on:click="editando=false">CANCELAR</button>

            </div>
          </div>
      </div>

      <div class="row" v-if="editando==false">
        <div class="col-md-9">
          <table class="table table-bordered">
            <thead>
            <th>clave</th>
              <th>Nombre de medicamento</th>
              <th>fecha caducidad</th>
              <th>tipo</th>
            </thead>
            <tbody>
              <tr v-for="med in medicamentos">
                <td>@{{med.clave_medicamento}}</td>
                <td>@{{med.nombre}}</td>
                <td>@{{med.fecha_caducidad}}</td>
                <td>@{{med.tipo}}</td>
                <td>
                  <span class="glyphicon glyphicon-pencil btn btn-xs btn-primary" v-on:click="showMedicamentos(med.clave_medicamento)"></span>
                  <span class="glyphicon glyphicon-trash btn btn-xs btn-danger" v-on:click="eliminarMedicamento(med.clave_medicamento)"></span>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>

<div class="modal fade" tabindex="-1" role="dialog" id="add_medicamentos">
       <div class="modal-dialog" role="document">
      <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria.label="close"><span
                                        aria-hidden="true">x</span></button>
        <h4 class="modal-title">nuevo medicamento</h4>
        </div>
      <div class="modal-body">
        <input type="text" name="" placeholder="nombre" class="form-control" v-model="nombre">
        <input type="date" name="" placeholder="fecha de caducidad" class="form-control" v-model="fecha_caducidad">
        <input type="text" name="" placeholder="tipo de medicamento" class="form-control" v-model="tipo">
<!--         <select class="form-control" v-model="idcarrera">
          <option disabled value="">Elija La Carrera</option>
          <option v-for="carrera in carreras" v-bind:value="carrera.idcarrera">@{{carrera.nombre}}</option>
        </select> -->

      </div>
      <div class="modal-footer">
        <!-- comprobar que funcione en la caja de texto -->

        <h6>Nombre : @{{ nombre }}</h6>
        <h6>ApellidoP : @{{ fecha_caducidad }}</h6>
        <h6>ApellidoM : @{{ tipo }}</h6>
        <!-- fin -->

          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary" v-on:click="agregarMedicamento()">Guardar</button>
      </div>
      </div><!-- /.modal-content -->
       </div>
 </div>
@endsection
@push('scripts')

<script src="js/vue-resource.js"></script>
<script src="js/medicamentos/medicamentos.js"></script>


@endpush
<input type="hidden" name="route" value="{{url('/')}}">