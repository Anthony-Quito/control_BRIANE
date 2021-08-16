<?php

include("db.php");

    if(isset($_POST['save_equipo'])){
        $imei = $_POST['imei'];
        $serial = $_POST['serial'];
        $color = $_POST['color'];
        $modelo = $_POST['modelo'];
        $marca = $_POST['marca'];
        $sim = $_POST['sim'];
        $cargador = $_POST['cargador'];
        $audifono = $_POST['audifono'];
        $caja = $_POST['caja'];

        $query = "INSERT INTO equipos(imei, serial, color, modelo, marca, sim, cargador, audifono, caja) VALUES('$imei', '$serial', '$color', '$modelo', '$marca', '$sim', '$cargador', '$audifono', '$caja')";
        $result = mysqli_query($conn, $query);

        
        if(!$result){
            die("Fallo al insertar");
        }
        echo 'Se agregó un equipo';
    }
?>