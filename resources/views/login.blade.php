<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>login</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script type="text/JavaScript" src="js/vue.js"></script>
    <!-- <link rel="stylesheet" href="css/fontello.css"> -->
    <link rel="stylesheet" type="text/css" href="css/index.css">
    <!-- <link rel="stylesheet" href="css/estilos.css"></head> -->
<body>

		<div class="modal-dialog text-center">
		<div class="col-sm-8 main-section">
			<div class="modal-content">
<!-- 				<div class="col-12 user-img">
					<img src="img/u.png" >
				</div> -->
				<form action="{{url('entrada')}}" method="POST">
				<form class="col-12" id="form-group">
					@csrf
					<div class="form-group" id="user-group">
						<input type="text" class="form-control" placeholder="nombre de usuario" name="user">
					</div>
						<div class="form-group" id="contraseña-group ">
						<input type="password" class="form-control" placeholder="nombre de usuario" name="contraseña">
					</div>
					<button type="submit" value="Ingresar" class="btn btn-success">Ingresar</button>
					<button class="btn btn-defaul" ><a href="{{url('registro')}}"> Registrar</a></button>
				</form>
			</div>
		</div>
	</div>

    <script src="js/bootstrap.min.js"></script>
    <script type="js/jquery-3.3.1.min.js"></script>


    
</body>
</html>

<input type="hidden" name="route" value="{{url('/')}}">