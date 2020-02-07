
<html>
<head>
	<meta charset="utf-8">
    <!-- <link rel="stylesheet" href="css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="css/fontello.css">
    <script src="js/vue.js"></script>
    <meta name="token" id="token" value="{{csrf_token()}}">
    <title></title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <script type="text/JavaScript" src="js/vue.js"></script>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script type="text/JavaScript" src="js/vue.min.js"></script>



    <link rel="stylesheet" href="css/index.css">
</head>
<body>
<div class="container" id="usuarios" >
<!-- @{{usuarios}} -->
	<div class="row">
		<div class="col-md-2">
			
		</div>
		<div class="col-md-8">
			<br>
			<div class="jumbotron">
				<h1 align="center">registro de usuarios</h1>
			</div>
						<div class="form-row">
							<div class="col-xs-4">
								<input type="text" placeholder="Escriba su primer nombre" class="form-control" v-model="nombre" >
							</div>
							<div class="col-xs-4">
								<input type="text" placeholder="Apellido Paterno" class="form-control" v-model="apellidop">
							</div>
							<div class="col-xs-4">
								<input type="text" placeholder="Apellido Materno" class="form-control" v-model="apellidom">
							</div>
						</div>
						<br>
						<br>
						<div class="form-row">
<!-- 							<div class="col-xs-5">
								<input type="text" placeholder="Escriba su direccion" class="form-control" >
							</div> -->
<!-- 							<div class="col-xs-4">
								<input type="text" placeholder="Escriba su Localidad" class="form-control" >
							</div> -->
<!-- 							<div class="col-xs-3">
								<select class="form-control" >
									<option disabled value="">Genero</option>
									<option>Masculino</option>
									<option>Femenino</option>
								</select>
							</div> -->
							<br>
							<br>
							<input type="file" class="form-control" @change="alSeleccionar"><br>
						</div>
						<div class="form-row">
							<div class="col-xs-6">
								<input type="text" placeholder="Escriba su Nombre de Usuario " class="form-control" v-model="user" >
							</div>
							<div class="col-xs-6">
								<input type="password" placeholder="ESCRIBA UNA CONTRASEÑA" class="form-control" v-model="contraseña" >
							</div>
						</div>
						</div>
					<div >	
					<button class="btn btn-success btn btn-block"
					v-on:click="guardarUser()">registrar</button>
					</div>
		</div>
		<div class="col-md-3">
			<img v-bind:src="preview" class="img img-rounded" width="600px" height="400px"
			 v-if="preview">
		</div>
		</div>

</div>
</div>


<script src="js/bootstrap.min.js"></script>
<script src="js/vue-resource.js"></script>
<script src="js/usuarios/usuarios.js"></script>
<script type="js/jquery-3.3.1.min.js"></script>
<script type="js/jquery.min.js"></script>
</body>
</html>


<input type="hidden" name="route" value="{{url('/')}}">