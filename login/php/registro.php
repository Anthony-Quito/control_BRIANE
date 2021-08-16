<?php 

	require_once "conexion.php";
	$conexion=conexion();

		$nombre=$_POST['nombre'];
		$usuario=$_POST['usuario'];
		$password=sha1($_POST['password']);
		$correo=$_POST['correo'];
		$telefono=$_POST['telefono'];
		$tipo_usuario=$_POST['tipo_usuario'];

		if(buscaRepetido($usuario,$password,$conexion)==1){
			echo 2;
		}else{
			$sql="INSERT into usuarios (nombre,usuario,password,correo,telefono,tipo_usuario)
				values ('$nombre','$usuario','$password','$correo','$telefono',$tipo_usuario)";
			echo $result=mysqli_query($conexion,$sql);
		}


		function buscaRepetido($user,$pass,$conexion){
			$sql="SELECT * from usuarios 
				where usuario='$user' and password='$pass'";
			$result=mysqli_query($conexion,$sql);

			if(mysqli_num_rows($result) > 0){
				return 1;
			}else{
				return 0;
			}
		}

 ?>