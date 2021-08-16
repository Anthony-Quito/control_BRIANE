<?php
    include('database.php');

    if(isset($_POST['dni'])){
        $dni = $_POST['dni'];
        $nombres = $_POST['nombres'];
        $apellidos = $_POST['apellidos'];
        $cargo = $_POST['cargo'];
        $plan = $_POST['plan'];
        $equipo = $_POST['equipo'];
        $numero_id = $_POST['numero_id'];
        $cargador = $_POST['cargador'];
        $audifono = $_POST['audifono'];
        $caja = $_POST['caja'];
        
        $query = "INSERT INTO trabajadores (dni, nombres, apellidos, cargo, plan, equipo, numero_id, cargador, audifono, caja) 
                  VALUES ('$dni', '$nombres', '$apellidos', '$cargo', '$plan', $equipo, $numero_id, '$cargador', '$audifono', '$caja')";

        $result = mysqli_query($connection, $query);
        if(!$result){
            die('Fallo al insertar ...');
        }
        echo 'Trabajador agregado correctamente';
    }

?>