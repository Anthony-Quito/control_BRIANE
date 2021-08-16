<?php
    include('database.php');

    $id = $_POST['id'];
    $numero = $_POST['numero'];
    $renta = $_POST['renta'];
    $mdm2_5 = $_POST['mdm2_5'];
    $tipo = $_POST['tipo'];
    $descripcion = $_POST['descripcion'];
    $observacion = $_POST['observacion'];

    $query = "UPDATE planess 
              SET numero = '$numero', renta = $renta, mdm2_5 = $mdm2_5, tipo = '$tipo', descripcion = '$descripcion', observacion = '$observacion' 
              WHERE id = '$id'";
    $result  = mysqli_query($connection, $query);

    if(!$result){
        die ('Fallo al editar plan...');
    }
    echo "Actualización satisfactoria del plan";
?>