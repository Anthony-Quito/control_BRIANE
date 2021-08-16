<?php
    include('database.php');

    $id = $_POST['id'];
    $dni = $_POST['dni'];
    $nombres = $_POST['nombres'];
    $apellidos = $_POST['apellidos'];
    $cargo = $_POST['cargo'];
    $plan = $_POST['plan'];
    $equipo= $_POST['equipo'];
    $numero_id = $_POST['numero_id'];
    $cargador = $_POST['cargador'];
    $audifono = $_POST['audifono'];
    $caja = $_POST['caja'];

    $query = "UPDATE trabajadores 
              SET dni = '$dni', nombres = '$nombres',apellidos = '$apellidos', cargo = '$cargo', plan = '$plan', equipo = $equipo, numero_id = $numero_id, cargador = '$cargador', audifono = '$audifono', caja = '$caja' 
              WHERE id_t = '$id'";
    $result  = mysqli_query($connection, $query);

    if(!$result){
        die ('Fallo al editar plan...');
    }
    echo "Actualización satisfactoria del trabajador";
?>