<!DOCTYPE html>
<html>
<head>
	<title>Registro</title>
	<?php require_once "scripts.php"; ?>
</head>
<body background="img/fondo.jpg">
<br><br><br>
<div class="container">
	<div class="row">
		<div class="col-sm-4"></div>
		<div class="col-sm-4">
			<div class="panel panel-danger">
				<div class="panel panel-heading">Registro de usuario</div>
				<div class="panel panel-body">
				<div style="text-align: center;">
						<img src="img/log.png" height="100">
					</div>
					<form id="frmRegistro">
						<label>Nombre Completo</label>
					<input type="text" class="form-control input-sm" id="nombre" name="">
					<label>Usuario</label>
					<input type="text" class="form-control input-sm" id="usuario" name="">
					<label>Password</label>
					<input type="password" class="form-control input-sm" id="password" name="">
					<label>Correo</label>
					<input type="text" class="form-control input-sm" id="correo" name="">
					<label>Telefono</label>
					<input type="text" class="form-control input-sm" id="telefono" name="">
					<label>Rol</label>
					<br>
					<p>1 = Administrador || 2 = Estándar</p>
					<input type="number" class="form-control input-sm" id="tipo_usuario" name="">
					<p></p>
					<span class="btn btn-primary" id="registrarNuevo">Registrar</span>
					</form>
					<div style="text-align: right;">
						<a href="index.php" class="btn btn-default">Login</a>
					</div>
				</div>
			</div>
		</div>
		<div class="col-sm-4"></div>
	</div>
</div>
</body>
</html>

<script type="text/javascript">
	$(document).ready(function(){
		$('#registrarNuevo').click(function(){

			if($('#nombre').val()==""){
				alertify.alert("Debes agregar el nombre");
				return false;
			}else if($('#usuario').val()==""){
				alertify.alert("Debes agregar el usuario");
				return false;
			}else if($('#password').val()==""){
				alertify.alert("Debes agregar el password");
				return false;
			}else if($('#correo').val()==""){
				alertify.alert("Debes agregar el correo");
				return false;
			}else if($('#telefono').val()==""){
				alertify.alert("Debes agregar el teléfono");
				return false;
			}else if($('#tipo_usuario').val()==""){
				alertify.alert("Debes agregar el rol");
				return false;
			}

			cadena="nombre=" + $('#nombre').val() +
					"&usuario=" + $('#usuario').val() + 
					"&password=" + $('#password').val() +
					"&correo=" + $('#correo').val() +
					"&telefono=" + $('#telefono').val() +
					"&tipo_usuario=" + $('#tipo_usuario').val();

					$.ajax({
						type:"POST",
						url:"php/registro.php",
						data:cadena,
						success:function(r){

							if(r==2){
								alertify.alert("Este usuario ya existe, prueba con otro :)");
							}
							else if(r==1){
								$('#frmRegistro')[0].reset();
								alertify.success("Agregado con exito");
							}else{
								alertify.error("Fallo al agregar");
							}
						}
					});
		});
	});
</script>

